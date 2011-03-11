<?php

/**
 * BaseMode3
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $config_id
 * @property string $vpn_auth_server
 * @property integer $vpn_auth_port
 * @property enum $vpn_auth_cipher
 * @property boolean $vpn_auth_compression
 * @property string $vpn_data_server
 * @property integer $vpn_data_port
 * @property enum $vpn_data_cipher
 * @property boolean $vpn_data_compression
 * @property Config $Config
 * @property Doctrine_Collection $DhcpServers
 * @property Doctrine_Collection $Certificates
 * 
 * @method integer             getConfigId()             Returns the current record's "config_id" value
 * @method string              getVpnAuthServer()        Returns the current record's "vpn_auth_server" value
 * @method integer             getVpnAuthPort()          Returns the current record's "vpn_auth_port" value
 * @method enum                getVpnAuthCipher()        Returns the current record's "vpn_auth_cipher" value
 * @method boolean             getVpnAuthCompression()   Returns the current record's "vpn_auth_compression" value
 * @method string              getVpnDataServer()        Returns the current record's "vpn_data_server" value
 * @method integer             getVpnDataPort()          Returns the current record's "vpn_data_port" value
 * @method enum                getVpnDataCipher()        Returns the current record's "vpn_data_cipher" value
 * @method boolean             getVpnDataCompression()   Returns the current record's "vpn_data_compression" value
 * @method Config              getConfig()               Returns the current record's "Config" value
 * @method Doctrine_Collection getDhcpServers()          Returns the current record's "DhcpServers" collection
 * @method Doctrine_Collection getCertificates()         Returns the current record's "Certificates" collection
 * @method Mode3               setConfigId()             Sets the current record's "config_id" value
 * @method Mode3               setVpnAuthServer()        Sets the current record's "vpn_auth_server" value
 * @method Mode3               setVpnAuthPort()          Sets the current record's "vpn_auth_port" value
 * @method Mode3               setVpnAuthCipher()        Sets the current record's "vpn_auth_cipher" value
 * @method Mode3               setVpnAuthCompression()   Sets the current record's "vpn_auth_compression" value
 * @method Mode3               setVpnDataServer()        Sets the current record's "vpn_data_server" value
 * @method Mode3               setVpnDataPort()          Sets the current record's "vpn_data_port" value
 * @method Mode3               setVpnDataCipher()        Sets the current record's "vpn_data_cipher" value
 * @method Mode3               setVpnDataCompression()   Sets the current record's "vpn_data_compression" value
 * @method Mode3               setConfig()               Sets the current record's "Config" value
 * @method Mode3               setDhcpServers()          Sets the current record's "DhcpServers" collection
 * @method Mode3               setCertificates()         Sets the current record's "Certificates" collection
 * 
 * @package    sf_sandbox
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7691 2011-02-04 15:43:29Z jwage $
 */
abstract class BaseMode3 extends RadiusSsid
{
    public function setTableDefinition()
    {
        parent::setTableDefinition();
        $this->setTableName('mode3');
        $this->hasColumn('config_id', 'integer', 4, array(
             'type' => 'integer',
             'unsigned' => true,
             'notnull' => true,
             'length' => 4,
             ));
        $this->hasColumn('vpn_auth_server', 'string', 255, array(
             'type' => 'string',
             'ip' => true,
             'notnull' => true,
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
             'default' => 'AES-128-CBC',
             'notnull' => true,
             ));
        $this->hasColumn('vpn_auth_compression', 'boolean', null, array(
             'type' => 'boolean',
             'notnull' => true,
             'default' => false,
             ));
        $this->hasColumn('vpn_data_server', 'string', 255, array(
             'type' => 'string',
             'ip' => true,
             'notnull' => false,
             'length' => 255,
             ));
        $this->hasColumn('vpn_data_port', 'integer', 3, array(
             'type' => 'integer',
             'unsigned' => true,
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
             'default' => 'AES-128-CBC',
             ));
        $this->hasColumn('vpn_data_compression', 'boolean', null, array(
             'type' => 'boolean',
             'default' => false,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('Config', array(
             'local' => 'config_id',
             'foreign' => 'id'));

        $this->hasMany('DhcpServer as DhcpServers', array(
             'local' => 'id',
             'foreign' => 'mode3_id'));

        $this->hasMany('Mode3Certificate as Certificates', array(
             'local' => 'id',
             'foreign' => 'mode3_id'));
    }
}