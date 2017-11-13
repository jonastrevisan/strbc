Ext.define('Strbc.view.autenticacao.Form', {
    alias : 'widget.login',
    extend : 'Ext.form.Panel',
    layout : 'fit',
    border : false,
    autoShow : true,
    initComponent : function() {

	    function onSpecialkey(field, e) {
		    if (e.getKey() === e.ENTER) {
			    this.fireEvent('enterExecute');
		    }
	    }

	    Ext.apply(this, {
	        items : [ {
	            xtype : 'form',
	            plain : true,
	            border : 0,
	            bodyPadding : 5,
	            defaultType : 'textfield',
	            defaults : {
		            anchor : '100%'
	            },

	            fieldDefaults : {
	                allowBlank : false,
	                msgTarget : 'side',
	                combineErrors : false,
	                labelWidth : 100,
	                labelAlign : 'top'
	            },

	            items : [ {
	                fieldLabel : 'Usuário',
	                name : 'usuario',
	                allowBlank : false,
	                //value : 'jj',
	                autoFocus : true,
	                selectOnFocus : true,
	                listeners : {
	                    scope : this,
	                    specialkey : onSpecialkey,
	                    afterrender : function(field) {
		                    field.focus(false, 100);
	                    }
	                }
	            }, {
	                fieldLabel : 'Senha',
	                name : 'senha',
	                allowBlank : false,
	                inputType : 'password',
	              // value : 'wwwpw',
	                selectOnFocus : true,
	                listeners : {
	                    scope : this,
	                    specialkey : onSpecialkey
	                }
	            }, {
	                xtype : 'checkbox',
	                fieldLabel : 'Lembrar Usario',
	                labelAlign : 'left',
	                name : 'lembrar',
					itemId:'lembrar'
	            }/*, {
	                xtype : 'button',
	                itemId : 'recuperarSenha',
	                text : 'Recuperar senha'

	            }*/ ],
	        } ],
	        buttons : [ {
	            itemId : 'submit',
	            text : 'Login',
	            formBind : true,
	            disabled : true,
	            type : 'submit',
	            itemId : 'login'
	        } ]
	    });

	    this.callParent(arguments);
    }
});