<?php

/**
 * RC class
 *
 * Manages rc.conf contents, other configuration classes will insert their rc.conf lines
 * through this class to maintain consistency.
 *
 */
class LighttpdConfig implements ConfigGenerator {

    public static $self;
    private $buffer;
    private $FILEPATH = "/etc/";
    private $FILENAME = "lighttpd.conf";


    private $mgmt_ip;

    /**
     * Get singleton instance
     * @static
     * @return RCConfig
     */
    public static function getInstance() {
        if (LighttpdConfig::$self == null) {
            LighttpdConfig::$self = new LighttpdConfig();
        }
        return LighttpdConfig::$self;
    }

    /**
     * Set management IP
     * @param $management_ip
     */
    public function setMgmtIP($ip) {
        $this->mgmt_ip = $ip;
    }

    /**
     * Get management IP
     * @return string
     */
    public function getMgmtIP() {
        return $this->mgmt_ip;
    }

    /**
     *
     */
    private function __construct() {
        $this->buffer = <<<CONFIGFILE

#
# lighttpd configuration file
#
# This is a generated file. Do not modify.
#
# use a it as base for lighttpd 1.0.0 and above
#
############ Options you really have to take care of ####################

## FreeBSD!
server.event-handler		= "freebsd-kqueue"
server.network-backend		= "writev"  ## Fixes 7.x upload issues

## modules to load
server.modules              =   ("mod_access", "mod_accesslog", "mod_fastcgi", "mod_cgi", "mod_alias", "mod_evhost")

## Unused modules
#                               "mod_setenv",
#                               "mod_compress"
#				"mod_redirect",
#                               "mod_rewrite",
#                               "mod_ssi",
#                               "mod_usertrack",
#                               "mod_expire",
#                               "mod_secdownload",
#                               "mod_rrdtool",
#                               "mod_auth",
#                               "mod_status",
#                               "mod_alias",
#                               "mod_proxy",
#                               "mod_simple_vhost",
#                               "mod_userdir",
#                               "mod_cgi",
#                                "mod_accesslog"

## a static document-root, for virtual-hosting take look at the
## server.virtual-* options
server.document-root        = "/usr/local/www/mgmt"

## where to send error-messages to
server.errorlog             = "/var/log/lighttpd.error.log"

# files to check for if .../ is requested
server.indexfiles           = ( "index.php", "index.html",
                                "index.htm", "default.htm" )

# mimetype mapping
mimetype.assign             = (
  ".pdf"          =>      "application/pdf",
  ".sig"          =>      "application/pgp-signature",
  ".ps"           =>      "application/postscript",
  ".tar.gz"       =>      "application/x-tgz",
  ".tgz"          =>      "application/x-tgz",
  ".tar"          =>      "application/x-tar",
  ".zip"          =>      "application/zip",
  ".gif"          =>      "image/gif",
  ".jpg"          =>      "image/jpeg",
  ".jpeg"         =>      "image/jpeg",
  ".png"          =>      "image/png",
  ".xbm"          =>      "image/x-xbitmap",
  ".xpm"          =>      "image/x-xpixmap",
  ".xwd"          =>      "image/x-xwindowdump",
  ".css"          =>      "text/css",
  ".html"         =>      "text/html",
  ".htm"          =>      "text/html",
  ".js"           =>      "text/javascript",
  ".asc"          =>      "text/plain",
  ".c"            =>      "text/plain",
  ".conf"         =>      "text/plain",
  ".text"         =>      "text/plain",
  ".txt"          =>      "text/plain",
  ".dtd"          =>      "text/xml",
  ".xml"          =>      "text/xml",
  ".bz2"          =>      "application/x-bzip",
  ".tbz"          =>      "application/x-bzip-compressed-tar",
  ".tar.bz2"      =>      "application/x-bzip-compressed-tar"
 )

# Use the "Content-Type" extended attribute to obtain mime type if possible
#mimetypes.use-xattr        = "enable"

#### accesslog module
#accesslog.filename          = "/dev/null"

## deny access the file-extensions
#
# ~    is for backupfiles from vi, emacs, joe, ...
# .inc is often used for code includes which should in general not be part
#      of the document-root
url.access-deny             = ( "~", ".inc" )


######### Options that are good to be but not neccesary to be changed #######

## bind to port (default: 80)
server.bind                = "{$this->mgmt_ip}"
server.port                = 80

## error-handler for status 404
#server.error-handler-404   = "/error-handler.html"
#server.error-handler-404   = "/error-handler.php"

## to help the rc.scripts
server.pid-file            = "/var/run/lighttpd"

## virtual directory listings
server.dir-listing         = "disable"

## enable debugging
debug.log-request-header   = "disable"
debug.log-response-header  = "disable"
debug.log-request-handling = "disable"
debug.log-file-not-found   = "disable"

#### compress module
#compress.cache-dir         = "/tmp/lighttpd/cache/compress/"
#compress.filetype          = ("text/plain", "text/html")

#server.network-backend = "writev"
server.upload-dirs = ( "/var/tmp", "/tmp/")
server.max-request-size    = 2097152

#### fastcgi module
## read fastcgi.txt for more info
fastcgi.server = ( ".php" =>
	( "localhost" =>
		(
			"socket" => "/tmp/php-fastcgi.socket",
			"min-procs" => 1,
			"max-procs" => 15,
			"bin-path" => "/usr/local/bin/php-cgi"
			)
	)
)

#### CGI module
cgi.assign                 = ( ".cgi" => "" )

CONFIGFILE;
	}

	/**
	 * Add a new virtual host definition
	 * 
	 * @param IP $ip
	 * @param integer $port
	 * @param string $directory
	 */
    public function addVirtualHost($ip, $port, $directory) {
        $this->buffer .= '
$HTTP["socket"] == "'.$ip.':'.$port.'" {
    server.document-root = "/var/www/'.$directory.'"
}';
    }

    /**
     * (non-PHPdoc)
     * @see Files/usr/local/lib/CUGAR/config/ConfigGenerator#setSavePath()
     */
    public function setSavePath($filepath) {
        $this->FILEPATH = $filepath;
    }

    /**
     * (non-PHPdoc)
     * @see Files/usr/local/lib/CUGAR/config/ConfigGenerator#writeConfig()
     */
    public function writeConfig() {
        $fp = fopen($this->FILEPATH . $this->FILENAME, 'w');
        if ($fp) {
            fwrite($fp, $this->buffer);
            fclose($fp);
        }
    }

}