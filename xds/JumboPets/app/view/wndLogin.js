/*
 * File: app/view/wndLogin.js
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

Ext.define('JumboPets.view.wndLogin', {
    extend: 'Ext.window.Window',
    alias: 'widget.wndlogin',

    requires: [
        'JumboPets.view.wndLoginViewModel',
        'Ext.form.Panel',
        'Ext.form.field.Text',
        'Ext.form.field.Checkbox',
        'Ext.button.Button',
        'Ext.Img'
    ],

    viewModel: {
        type: 'wndlogin'
    },
    modal: true,
    autoShow: true,
    height: 228,
    id: 'wndLogin',
    width: 326,
    layout: 'fit',
    closable: false,
    title: 'Login to Jumbo Pets',
    defaultListenerScope: true,

    listeners: {
        afterrender: 'onWndLoginAfterRender'
    },
    items: [
        {
            xtype: 'form',
            border: false,
            layout: 'absolute',
            bodyPadding: 10,
            title: '',
            items: [
                {
                    xtype: 'textfield',
                    x: 50,
                    y: 80,
                    id: 'txtLoginEmail',
                    fieldLabel: 'Email',
                    labelWidth: 60
                },
                {
                    xtype: 'textfield',
                    x: 50,
                    y: 110,
                    id: 'txtLoginPassword',
                    fieldLabel: 'Password',
                    labelWidth: 60,
                    inputType: 'password',
                    enableKeyEvents: true,
                    listeners: {
                        keyup: 'onTxtLoginPasswordKeyup'
                    }
                },
                {
                    xtype: 'checkboxfield',
                    x: 114,
                    y: 135,
                    id: 'chkRememberMe',
                    fieldLabel: '',
                    boxLabel: 'Remember Me'
                },
                {
                    xtype: 'button',
                    x: 210,
                    y: 160,
                    id: 'btnLogin',
                    icon: '/images/icons/png/16x16/Key.png',
                    text: 'Login',
                    listeners: {
                        click: 'onButtonClick'
                    }
                },
                {
                    xtype: 'button',
                    x: 50,
                    y: 160,
                    icon: '/images/icons/png/16x16/LightBulb.png',
                    text: 'Forgot Password',
                    listeners: {
                        click: 'onButtonClick1'
                    }
                },
                {
                    xtype: 'image',
                    x: 80,
                    y: 10,
                    height: 57,
                    width: 160,
                    src: '/images/logo.svg'
                }
            ]
        }
    ],

    onWndLoginAfterRender: function(component, eOpts) {
        function accessCookie(cookieName)
        {
            var name = cookieName + "=";
            var allCookieArray = document.cookie.split(';');
            for(var i=0; i<allCookieArray.length; i++)
            {
                var temp = allCookieArray[i].trim();
                if (temp.indexOf(name)==0)
                    return temp.substring(name.length,temp.length);
            }
            return "";
        }
        var email = accessCookie("remember");
        Ext.getCmp('txtLoginEmail').setValue(email);
        if (email) {
            Ext.getCmp('chkRememberMe').setValue(true);
        }
    },

    onTxtLoginPasswordKeyup: function(textfield, e, eOpts) {
        if (e.keyCode == 13) {
            Ext.getCmp('btnLogin').fireEvent('click');
        }
    },

    onButtonClick: function(button, e, eOpts) {
        var email = Ext.getCmp('txtLoginEmail').getValue();
        var password = Ext.getCmp('txtLoginPassword').getValue();

        if (Ext.getCmp('chkRememberMe').getValue()) {
            var date = new Date();
            date.setTime(date.getTime()+(24*60*60*10000));
            document.cookie = "remember="+email+"; expires=" + date.toGMTString();
        } else {
            function delete_cookie(name) {
              document.cookie = name +'=; Path=/; Expires=Thu, 01 Jan 1970 00:00:01 GMT;';
            }
            delete_cookie("remember");
        }

        Ext.Ajax.request({
            url: '/api/user/login',
            method: "POST",
            scope: this,
            params: {
                email: email,
                password: password
            },
            success: function (response, eopts) {
                var obj = Ext.decode(response.responseText);
                if (!obj.success) {
                    Ext.Msg.alert("Failure", obj.message);
                } else {
                    var form = Ext.create('CrmApp.view.frmMain', {
                        renderTo: Ext.getBody()
                    });
                    Ext.getCmp('frmMain').populateUi();
                    this.close();
                    if (obj.resetPassword) {
                        var window = fetchOrCreate("wndResetPassword");
                        window.show();
                    }
                }
            }
        });
    },

    onButtonClick1: function(button, e, eOpts) {
        var email = Ext.getCmp('txtLoginEmail').getValue();
        Ext.Ajax.request({
            url: '/api/user/password/reminder',
            method: "POST",
            scope: this,
            params: {
                email: email
            },
            success: function (response, eopts) {
                var obj = Ext.decode(response.responseText);
                if (!obj.success) {
                    Ext.Msg.alert("Failure", "Your email address was not found in the database");
                } else {
                    Ext.Msg.alert("Success", "Your email has been forwarded your new password");
                }
            }
        });
    }

});