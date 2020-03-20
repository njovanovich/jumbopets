{
    "xdsVersion": "4.2.6",
    "frameworkVersion": "ext66",
    "internals": {
        "type": "Ext.window.Window",
        "reference": {
            "name": "items",
            "type": "array"
        },
        "codeClass": null,
        "userConfig": {
            "closable": false,
            "designer|userAlias": "wndlogin",
            "designer|userClassName": "wndLogin",
            "height": 228,
            "id": "wndLogin",
            "layout": "fit",
            "modal": true,
            "title": "Login to LeadCRM",
            "width": 326
        },
        "configAlternates": {
            "closable": "boolean",
            "designer|userAlias": "string",
            "designer|userClassName": "string",
            "height": "auto",
            "id": "string",
            "layout": "string",
            "modal": "boolean",
            "title": "string",
            "width": "auto"
        },
        "name": "MyWindow1",
        "cn": [
            {
                "type": "basiceventbinding",
                "reference": {
                    "name": "listeners",
                    "type": "array"
                },
                "codeClass": null,
                "userConfig": {
                    "fn": "onWndLoginAfterRender",
                    "implHandler": [
                        "function accessCookie(cookieName)",
                        "{",
                        "    var name = cookieName + \"=\";",
                        "    var allCookieArray = document.cookie.split(';');",
                        "    for(var i=0; i<allCookieArray.length; i++)",
                        "    {",
                        "        var temp = allCookieArray[i].trim();",
                        "        if (temp.indexOf(name)==0)",
                        "            return temp.substring(name.length,temp.length);",
                        "    }",
                        "    return \"\";",
                        "}",
                        "var email = accessCookie(\"remember\");",
                        "Ext.getCmp('txtLoginEmail').setValue(email);",
                        "if (email) {",
                        "    Ext.getCmp('chkRememberMe').setValue(true);",
                        "}"
                    ],
                    "name": "afterrender",
                    "scope": "me"
                },
                "configAlternates": {
                    "fn": "string",
                    "implHandler": "code",
                    "name": "string",
                    "scope": "string"
                },
                "name": "onWndLoginAfterRender"
            },
            {
                "type": "Ext.form.Panel",
                "reference": {
                    "name": "items",
                    "type": "array"
                },
                "codeClass": null,
                "userConfig": {
                    "bodyPadding": 10,
                    "border": false,
                    "designer|snapToGrid": 10,
                    "layout": "absolute",
                    "title": ""
                },
                "configAlternates": {
                    "bodyPadding": "auto",
                    "designer|snapToGrid": "number",
                    "layout": "string",
                    "title": "string",
                    "border": "boolean"
                },
                "name": "MyForm",
                "cn": [
                    {
                        "type": "Ext.Img",
                        "reference": {
                            "name": "items",
                            "type": "array"
                        },
                        "codeClass": null,
                        "userConfig": {
                            "height": 58,
                            "layout|x": 70,
                            "layout|y": 10,
                            "src": "/images/logo.png",
                            "width": 180
                        },
                        "configAlternates": {
                            "height": "auto",
                            "layout|x": "number",
                            "layout|y": "number",
                            "src": "uri",
                            "width": "auto"
                        },
                        "name": "MyImg2"
                    },
                    {
                        "type": "Ext.form.field.Text",
                        "reference": {
                            "name": "items",
                            "type": "array"
                        },
                        "codeClass": null,
                        "userConfig": {
                            "fieldLabel": "Email",
                            "id": "txtLoginEmail",
                            "labelWidth": 60,
                            "layout|x": 50,
                            "layout|y": 80
                        },
                        "configAlternates": {
                            "fieldLabel": "string",
                            "labelWidth": "number",
                            "layout|x": "number",
                            "layout|y": "number",
                            "id": "string"
                        },
                        "name": "MyTextField2"
                    },
                    {
                        "type": "Ext.form.field.Text",
                        "reference": {
                            "name": "items",
                            "type": "array"
                        },
                        "codeClass": null,
                        "userConfig": {
                            "enableKeyEvents": true,
                            "fieldLabel": "Password",
                            "id": "txtLoginPassword",
                            "inputType": "password",
                            "labelWidth": 60,
                            "layout|x": 50,
                            "layout|y": 110
                        },
                        "configAlternates": {
                            "fieldLabel": "string",
                            "labelWidth": "number",
                            "layout|x": "number",
                            "layout|y": "number",
                            "id": "string",
                            "inputType": "string",
                            "enableKeyEvents": "boolean"
                        },
                        "name": "MyTextField3",
                        "cn": [
                            {
                                "type": "basiceventbinding",
                                "reference": {
                                    "name": "listeners",
                                    "type": "array"
                                },
                                "codeClass": null,
                                "userConfig": {
                                    "fn": "onTxtLoginPasswordKeyup",
                                    "implHandler": [
                                        "if (e.keyCode == 13) {",
                                        "    Ext.getCmp('btnLogin').fireEvent('click');",
                                        "}"
                                    ],
                                    "name": "keyup",
                                    "scope": "me"
                                },
                                "configAlternates": {
                                    "fn": "string",
                                    "implHandler": "code",
                                    "name": "string",
                                    "scope": "string"
                                },
                                "name": "onTxtLoginPasswordKeyup"
                            }
                        ]
                    },
                    {
                        "type": "Ext.form.field.Checkbox",
                        "reference": {
                            "name": "items",
                            "type": "array"
                        },
                        "codeClass": null,
                        "userConfig": {
                            "boxLabel": "Remember Me",
                            "fieldLabel": "",
                            "id": "chkRememberMe",
                            "layout|x": 114,
                            "layout|y": 135
                        },
                        "configAlternates": {
                            "boxLabel": "string",
                            "fieldLabel": "string",
                            "id": "string",
                            "layout|x": "number",
                            "layout|y": "number"
                        },
                        "name": "MyCheckbox"
                    },
                    {
                        "type": "Ext.button.Button",
                        "reference": {
                            "name": "items",
                            "type": "array"
                        },
                        "codeClass": null,
                        "userConfig": {
                            "icon": "/images/icons/png/16x16/Key.png",
                            "id": "btnLogin",
                            "layout|x": 210,
                            "layout|y": 160,
                            "text": "Login"
                        },
                        "configAlternates": {
                            "icon": "string",
                            "layout|x": "number",
                            "layout|y": "number",
                            "text": "string",
                            "id": "string"
                        },
                        "name": "MyButton27",
                        "cn": [
                            {
                                "type": "basiceventbinding",
                                "reference": {
                                    "name": "listeners",
                                    "type": "array"
                                },
                                "codeClass": null,
                                "userConfig": {
                                    "fn": "onButtonClick",
                                    "implHandler": [
                                        "var email = Ext.getCmp('txtLoginEmail').getValue();",
                                        "var password = Ext.getCmp('txtLoginPassword').getValue();",
                                        "",
                                        "if (Ext.getCmp('chkRememberMe').getValue()) {",
                                        "    var date = new Date();",
                                        "    date.setTime(date.getTime()+(24*60*60*10000));",
                                        "    document.cookie = \"remember=\"+email+\"; expires=\" + date.toGMTString();",
                                        "} else {",
                                        "    function delete_cookie(name) {",
                                        "      document.cookie = name +'=; Path=/; Expires=Thu, 01 Jan 1970 00:00:01 GMT;';",
                                        "    }",
                                        "    delete_cookie(\"remember\");",
                                        "}",
                                        "",
                                        "Ext.Ajax.request({",
                                        "    url: '/api/user/login',",
                                        "    method: \"POST\",",
                                        "    scope: this,",
                                        "    params: {",
                                        "        email: email,",
                                        "        password: password",
                                        "    },",
                                        "    success: function (response, eopts) {",
                                        "        var obj = Ext.decode(response.responseText);",
                                        "        if (!obj.success) {",
                                        "            Ext.Msg.alert(\"Failure\", obj.message);",
                                        "        } else {",
                                        "            var form = Ext.create('CrmApp.view.frmMain', {",
                                        "                renderTo: Ext.getBody()",
                                        "            });",
                                        "            Ext.getCmp('frmMain').populateUi();",
                                        "            this.close();",
                                        "            if (obj.resetPassword) {",
                                        "                var window = fetchOrCreate(\"wndResetPassword\");",
                                        "                window.show();",
                                        "            }",
                                        "        }",
                                        "    }",
                                        "});"
                                    ],
                                    "name": "click",
                                    "scope": "me"
                                },
                                "configAlternates": {
                                    "fn": "string",
                                    "implHandler": "code",
                                    "name": "string",
                                    "scope": "string"
                                },
                                "name": "onButtonClick"
                            }
                        ]
                    },
                    {
                        "type": "Ext.button.Button",
                        "reference": {
                            "name": "items",
                            "type": "array"
                        },
                        "codeClass": null,
                        "userConfig": {
                            "icon": "/images/icons/png/16x16/LightBulb.png",
                            "layout|x": 50,
                            "layout|y": 160,
                            "text": "Forgot Password"
                        },
                        "configAlternates": {
                            "icon": "string",
                            "layout|x": "number",
                            "layout|y": "number",
                            "text": "string"
                        },
                        "name": "MyButton31",
                        "cn": [
                            {
                                "type": "basiceventbinding",
                                "reference": {
                                    "name": "listeners",
                                    "type": "array"
                                },
                                "codeClass": null,
                                "userConfig": {
                                    "fn": "onButtonClick1",
                                    "implHandler": [
                                        "var email = Ext.getCmp('txtLoginEmail').getValue();",
                                        "Ext.Ajax.request({",
                                        "    url: '/api/user/password/reminder',",
                                        "    method: \"POST\",",
                                        "    scope: this,",
                                        "    params: {",
                                        "        email: email",
                                        "    },",
                                        "    success: function (response, eopts) {",
                                        "        var obj = Ext.decode(response.responseText);",
                                        "        if (!obj.success) {",
                                        "            Ext.Msg.alert(\"Failure\", \"Your email address was not found in the database\");",
                                        "        } else {",
                                        "            Ext.Msg.alert(\"Success\", \"Your email has been forwarded your new password\");",
                                        "        }",
                                        "    }",
                                        "});"
                                    ],
                                    "name": "click",
                                    "scope": "me"
                                },
                                "configAlternates": {
                                    "fn": "string",
                                    "implHandler": "code",
                                    "name": "string",
                                    "scope": "string"
                                },
                                "name": "onButtonClick1"
                            }
                        ]
                    }
                ]
            }
        ]
    },
    "linkedNodes": {},
    "boundStores": {},
    "boundModels": {},
    "viewController": {
        "xdsVersion": "4.2.6",
        "frameworkVersion": "ext66",
        "internals": {
            "type": "Ext.app.ViewController",
            "reference": {
                "name": "items",
                "type": "array"
            },
            "codeClass": null,
            "userConfig": {
                "designer|userAlias": "wndlogin",
                "designer|userClassName": "wndLoginViewController"
            },
            "configAlternates": {
                "designer|userAlias": "string",
                "designer|userClassName": "string"
            }
        },
        "linkedNodes": {},
        "boundStores": {},
        "boundModels": {}
    },
    "viewModel": {
        "xdsVersion": "4.2.6",
        "frameworkVersion": "ext66",
        "internals": {
            "type": "Ext.app.ViewModel",
            "reference": {
                "name": "items",
                "type": "array"
            },
            "codeClass": null,
            "userConfig": {
                "designer|userAlias": "wndlogin",
                "designer|userClassName": "wndLoginViewModel"
            },
            "configAlternates": {
                "designer|userAlias": "string",
                "designer|userClassName": "string"
            }
        },
        "linkedNodes": {},
        "boundStores": {},
        "boundModels": {}
    }
}