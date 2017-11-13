Ext.define('Strbc.util.CriarTab', {

    NovaTab: function (id, Titulo, xtype) {
        var tabID = id;
        var tabFilha = Ext.getCmp('tabCenter').items.findBy(
						function (i) {
						    return i.id === tabID;
						});
        var tabPrincipal = Ext.getCmp('tabCenter');
        if (!tabFilha) {

            var tabComponemte = tabPrincipal.add({
                xtype: 'panel',
                closable: true,
                closeAction: 'destroy',
                id: id,
                flex: 1,
                layout: {
                    type: 'fit'
                },
                title: Titulo,
                items: {
                    xtype: xtype
                }
            });
            tabPrincipal.setActiveTab(tabComponemte);
            return true;
        } else {
            // alert('jah existe');
            tabPrincipal.setActiveTab(tabID);
            return false;
        }

    },
    AbrirPagina: function (id, Titulo, URL) {
        var tabID = id;
        var tabFilha = Ext.getCmp('tabCenter').items.findBy(
						function (i) {
						    return i.id === tabID;
						});
        var tabPrincipal = Ext.getCmp('tabCenter');
        if (!tabFilha) {
            var tab = tabPrincipal.add({
                xtype: 'component',
                closable: true,
                flex: 1,
                title: Titulo,
                id: id,
                autoEl: {
                    tag: 'iframe',
                    width: '100%',
                    height: '100%',
                    focusOnLoad: true,
                    frameborder: 0,
                    src: URL
                }
            });

            tabPrincipal.setActiveTab(tab);
        } else {
            // alert('jah existe');
            tabPrincipal.setActiveTab(tabID);
        }
    }
});