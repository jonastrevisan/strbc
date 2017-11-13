Ext.define('Strbc.view.usuarios.permissoes.ComboBox', {

    extend          : 'Ext.form.field.ComboBox',
    store			: 'Strbc.store.Permissoes',
    
    alias           : 'widget.permissoescombo',
    name            : 'permissaoId',
    ref             : 'permissaoId',    
    anchor          : '100%', 
        
    displayField    : 'nome',
    valueField      : 'id',
    
    queryMode       : 'local',
    typeAhead       : true,
    forceSelection  : true,
    triggerAction	: 'all',
    lazyRender		: true,
    
    initComponent: function () {
        this.callParent(arguments);
        //this.store.load();
    }
});