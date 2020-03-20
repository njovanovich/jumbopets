/*
 * File: app.js
 *
 * This file was generated by Sencha Architect version 4.2.6.
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

// @require @packageOverrides
Ext.Loader.setConfig({

});


Ext.application({
    stores: [
        'strMethods'
    ],
    views: [
        'wndLogin',
        'frmMain',
        'frmBody'
    ],
    name: 'JumboPets',

    launch: function() {
        var w=Ext.create('JumboPets.view.wndLogin');
        w.show();
        window.onresize = function(event) {
            var win = window,
                doc = document,
                docElem = doc.documentElement,
                body = doc.getElementsByTagName('body')[0],
                x = win.innerWidth || docElem.clientWidth || body.clientWidth,
                y = win.innerHeight|| docElem.clientHeight|| body.clientHeight;
            Ext.getCmp('frmMain').setHeight(y);
            Ext.getCmp('frmMain').setWidth(x);
        };
    }

});
