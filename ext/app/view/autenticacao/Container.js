Ext.define('Strbc.view.autenticacao.Container', {

    extend : 'Ext.form.Panel',
    region : 'east',
    frame : true,
    width : 300,
    bodyBorder : true,
    bodyPadding : 5,
    title : 'Acesso restrito',
    alias : 'widget.logincontainer',
    itemId : 'logins-container',

    items : [ {
        xtype : 'fieldset',
        height : 250,
        title : 'Acesso ao sistema',
        items : [ {
	        xtype : 'login'
        } ]
    } ]
});