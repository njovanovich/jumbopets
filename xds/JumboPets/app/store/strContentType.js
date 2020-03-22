/*
 * File: app/store/strContentType.js
 * Date: Fri Mar 20 2020 17:52:24 GMT+1000 (E. Australia Standard Time)
 *
 * This file was generated by Sencha Architect
 * http://www.sencha.com/products/architect/
 *
 * This file requires use of the Ext JS 6.6.x Classic library, under independent license.
 * License of Sencha Architect does not include license for Ext JS 6.6.x Classic. For more
 * details see http://www.sencha.com/license or contact license@sencha.com.
 *
 * This file will be auto-generated each and everytime you save your project.
 *
 * Do NOT hand edit this file.
 */

Ext.define('JumboPets.store.strContentType', {
    extend: 'Ext.data.Store',

    requires: [
        'Ext.data.field.Field'
    ],

    constructor: function(cfg) {
        var me = this;
        cfg = cfg || {};
        me.callParent([Ext.apply({
            storeId: 'strContentType',
            data: [
                {
                    name: 'application/json'
                }
            ],
            fields: [
                {
                    name: 'name'
                }
            ]
        }, cfg)]);
    }
});