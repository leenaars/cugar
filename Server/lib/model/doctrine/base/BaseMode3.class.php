<?php

/**
 * BaseMode3
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property integer $ssid_id
 * @property integer $retry_interval
 * @property string $own_ip
 * @property string $nas_identifier
 * @property string $dhcprelay_ip
 * @property string $hw_interface
 * @property string $radius_auth_ip
 * @property integer $radius_auth_port
 * @property string $radius_auth_shared_secret
 * @property integer $radius_auth_interim_interval
 * @property string $radius_acct_auth_ip
 * @property integer $radius_acct_auth_port
 * @property string $radius_acct_auth_shared_secret
 * @property integer $radius_acct_interim_interval
 * @property string $vpn_auth_server
 * @property integer $vpn_auth_port
 * @property enum $vpn_auth_cipher
 * @property boolean $vpn_auth_compression
 * @property integer $vpn_data_port
 * @property enum $vpn_data_cipher
 * @property boolean $vpn_data_compression
 * @property Ssid $Ssid
 * @property DhcpServer $DhcpServers
 * 
 * @method integer    getId()                             Returns the current record's "id" value
 * @method integer    getSsidId()                         Returns the current record's "ssid_id" value
 * @method integer    getRetryInterval()                  Returns the current record's "retry_interval" value
 * @method string     getOwnIp()                          Returns the current record's "own_ip" value
 * @method string     getNasIdentifier()                  Returns the current record's "nas_identifier" value
 * @method string     getDhcprelayIp()                    Returns the current record's "dhcprelay_ip" value
 * @method string     getHwInterface()                    Returns the current record's "hw_interface" value
 * @method string     getRadiusAuthIp()                   Returns the current record's "radius_auth_ip" value
 * @method integer    getRadiusAuthPort()                 Returns the current record's "radius_auth_port" value
 * @method string     getRadiusAuthSharedSecret()         Returns the current record's "radius_auth_shared_secret" value
 * @method integer    getRadiusAuthInterimInterval()      Returns the current record's "radius_auth_interim_interval" value
 * @method string     getRadiusAcctAuthIp()               Returns the current record's "radius_acct_auth_ip" value
 * @method integer    getRadiusAcctAuthPort()             Returns the current record's "radius_acct_auth_port" value
 * @method string     getRadiusAcctAuthSharedSecret()     Returns the current record's "radius_acct_auth_shared_secret" value
 * @method integer    getRadiusAcctInterimInterval()      Returns the current record's "radius_acct_interim_interval" value
 * @method string     getVpnAuthServer()                  Returns the current record's "vpn_auth_server" value
 * @method integer    getVpnAuthPort()                    Returns the current record's "vpn_auth_port" value
 * @method enum       getVpnAuthCipher()                  Returns the current record's "vpn_auth_cipher" value
 * @method boolean    getVpnAuthCompression()             Returns the current record's "vpn_auth_compression" value
 * @method integer    getVpnDataPort()                    Returns the current record's "vpn_data_port" value
 * @method enum       getVpnDataCipher()                  Returns the current record's "vpn_data_cipher" value
 * @method boolean    getVpnDataCompression()             Returns the current record's "vpn_data_compression" value
 * @method Ssid       getSsid()                           Returns the current record's "Ssid" value
 * @method DhcpServer getDhcpServers()                    Returns the current record's "DhcpServers" value
 * @method Mode3      setId()                             Sets the current record's "id" value
 * @method Mode3      setSsidId()                         Sets the current record's "ssid_id" value
 * @method Mode3      setRetryInterval()                  Sets the current record's "retry_interval" value
 * @method Mode3      setOwnIp()                          Sets the current record's "own_ip" value
 * @method Mode3      setNasIdentifier()                  Sets the current record's "nas_identifier" value
 * @method Mode3      setDhcprelayIp()                    Sets the current record's "dhcprelay_ip" value
 * @method Mode3      setHwInterface()                    Sets the current record's "hw_interface" value
 * @method Mode3      setRadiusAuthIp()                   Sets the current record's "radius_auth_ip" value
 * @method Mode3      setRadiusAuthPort()                 Sets the current record's "radius_auth_port" value
 * @method Mode3      setRadiusAuthSharedSecret()         Sets the current record's "radius_auth_shared_secret" value
 * @method Mode3      setRadiusAuthInterimInterval()      Sets the current record's "radius_auth_interim_interval" value
 * @method Mode3      setRadiusAcctAuthIp()               Sets the current record's "radius_acct_auth_ip" value
 * @method Mode3      setRadiusAcctAuthPort()             Sets the current record's "radius_acct_auth_port" value
 * @method Mode3      setRadiusAcctAuthSharedSecret()     Sets the current record's "radius_acct_auth_shared_secret" value
 * @method Mode3      setRadiusAcctInterimInterval()      Sets the current record's "radius_acct_interim_interval" value
 * @method Mode3      setVpnAuthServer()                  Sets the current record's "vpn_auth_server" value
 * @method Mode3      setVpnAuthPort()                    Sets the current record's "vpn_auth_port" value
 * @method Mode3      setVpnAuthCipher()                  Sets the current record's "vpn_auth_cipher" value
 * @method Mode3      setVpnAuthCompression()             Sets the current record's "vpn_auth_compression" value
 * @method Mode3      setVpnDataPort()                    Sets the current record's "vpn_data_port" value
 * @method Mode3      setVpnDataCipher()                  Sets the current record's "vpn_data_cipher" value
 * @method Mode3      setVpnDataCompression()             Sets the current record's "vpn_data_compression" value
 * @method Mode3      setSsid()                           Sets the current record's "Ssid" value
 * @method Mode3      setDhcpServers()                    Sets the current record's "DhcpServers" value
 * 
 * @package    sf_sandbox
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseMode3 extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('mode3');
        $this->hasColumn('id', 'integer', 4, array(
             'type' => 'integer',
             'unsigned' => true,
             'autoincrement' => true,
             'primary' => true,
             'length' => 4,
             ));
        $this->hasColumn('ssid_id', 'integer', 4, array(
             'type' => 'integer',
             'unsigned' => true,
             'notnull' => true,
             'length' => 4,
             ));
        $this->hasColumn('retry_interval', 'integer', 4, array(
             'type' => 'integer',
             'unsigned' => true,
             'notnull' => true,
             'length' => 4,
             ));
        $this->hasColumn('own_ip', 'string', 15, array(
             'type' => 'string',
             'ip' => true,
             'notnull' => true,
             'length' => 15,
             ));
        $this->hasColumn('nas_identifier', 'string', 48, array(
             'type' => 'string',
             'notnull' => true,
             'minlength' => 1,
             'length' => 48,
             ));
        $this->hasColumn('dhcprelay_ip', 'string', 15, array(
             'type' => 'string',
             'ip' => true,
             'notnull' => true,
             'length' => 15,
             ));
        $this->hasColumn('hw_interface', 'string', 5, array(
             'type' => 'string',
             'notnull' => true,
             'minlength' => 3,
             'length' => 5,
             ));
        $this->hasColumn('radius_auth_ip', 'string', 15, array(
             'type' => 'string',
             'ip' => true,
             'notnull' => true,
             'length' => 15,
             ));
        $this->hasColumn('radius_auth_port', 'integer', 3, array(
             'type' => 'integer',
             'unsigned' => true,
             'notnull' => true,
             'range' => 
             array(
              0 => 1,
              1 => 65535,
             ),
             'length' => 3,
             ));
        $this->hasColumn('radius_auth_shared_secret', 'string', 255, array(
             'type' => 'string',
             'notnull' => true,
             'minlength' => 1,
             'length' => 255,
             ));
        $this->hasColumn('radius_auth_interim_interval', 'integer', 3, array(
             'type' => 'integer',
             'unsigned' => true,
             'notnull' => true,
             'range' => 
             array(
              0 => 1,
             ),
             'length' => 3,
             ));
        $this->hasColumn('radius_acct_auth_ip', 'string', 15, array(
             'type' => 'string',
             'ip' => true,
             'notnull' => true,
             'length' => 15,
             ));
        $this->hasColumn('radius_acct_auth_port', 'integer', 3, array(
             'type' => 'integer',
             'unsigned' => true,
             'notnull' => true,
             'range' => 
             array(
              0 => 1,
              1 => 65535,
             ),
             'length' => 3,
             ));
        $this->hasColumn('radius_acct_auth_shared_secret', 'string', 255, array(
             'type' => 'string',
             'notnull' => true,
             'minlength' => 1,
             'length' => 255,
             ));
        $this->hasColumn('radius_acct_interim_interval', 'integer', 3, array(
             'type' => 'integer',
             'unsigned' => true,
             'notnull' => true,
             'range' => 
             array(
              0 => 1,
             ),
             'length' => 3,
             ));
        $this->hasColumn('vpn_auth_server', 'string', 255, array(
             'type' => 'string',
             'notnull' => true,
             'minlength' => 4,
             'length' => 255,
             ));
        $this->hasColumn('vpn_auth_port', 'integer', 3, array(
             'type' => 'integer',
             'unsigned' => true,
             'notnull' => true,
             'range' => 
             array(
              0 => 1,
              1 => 65535,
             ),
             'length' => 3,
             ));
        $this->hasColumn('vpn_auth_cipher', 'enum', null, array(
             'type' => 'enum',
             'values' => 
             array(
              0 => 'DES-CBC',
              1 => 'AES-128-CBC',
              2 => 'AES-192-CBC',
              3 => 'AES-256-CBC',
              4 => 'BF-CBC',
             ),
             'notnull' => true,
             ));
        $this->hasColumn('vpn_auth_compression', 'boolean', null, array(
             'type' => 'boolean',
             'notnull' => true,
             ));
        $this->hasColumn('vpn_data_port', 'integer', 3, array(
             'type' => 'integer',
             'unsigned' => true,
             'notnull' => true,
             'range' => 
             array(
              0 => 1,
              1 => 65535,
             ),
             'length' => 3,
             ));
        $this->hasColumn('vpn_data_cipher', 'enum', null, array(
             'type' => 'enum',
             'values' => 
             array(
              0 => 'DES-CBC',
              1 => 'AES-128-CBC',
              2 => 'AES-192-CBC',
              3 => 'AES-256-CBC',
              4 => 'BF-CBC',
             ),
             'notnull' => true,
             ));
        $this->hasColumn('vpn_data_compression', 'boolean', null, array(
             'type' => 'boolean',
             'notnull' => true,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('Ssid', array(
             'local' => 'ssid_id',
             'foreign' => 'id'));

        $this->hasOne('DhcpServer as DhcpServers', array(
             'local' => 'id',
             'foreign' => 'mode3_id'));
    }
}