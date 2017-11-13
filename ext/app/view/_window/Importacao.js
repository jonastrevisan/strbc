Ext.apply(Ext.form.field.VTypes, {
	file : function(val, field) {
		var input, files, file, acceptSize = field.acceptSize || 4096, acceptMimes = field.acceptMimes || [ 'csv', 'zip' ];

		input = Ext.get(field.id + '-inputEl');
		files = input.getAttribute('files');
		if (!files || !window.FileReader) {
			return true;
		}

		for ( var i = 0, l = files.length; i < l; i++) {
			file = files[i];
			if (file.size > acceptSize * 1024) {
				this.fileText = (file.size / 1048576).toFixed(1) + ' MB: Tamanho do arquivo inválido (' + (acceptSize / 1024).toFixed(1) + ' MB máximo)';
				return false;
			}

			var ext = file.name.substring(file.name.lastIndexOf('.') + 1);
			if (Ext.Array.indexOf(acceptMimes, ext) === -1) {
				this.fileText = 'Formato do arquivo é inválido(' + ext + ')';
				return false;
			}
		}
		return true;
	}
});

Ext.define('fileupload', {
    extend : 'Ext.form.field.Text',
    alias : 'widget.fileupload',
    inputType : 'file',
    listeners : {
	    render : function(me, eOpts) {
		    var el = Ext.get(me.id + '-inputEl');
		    el.set({
			    size : me.inputSize || 1
		    });
		    if (me.multiple) {
			    el.set({
				    multiple : 'multiple'
			    });
		    }
	    }
    }
});

Ext
    .define('Strbc.view.window.Importacao', {
        extend : 'Ext.window.Window',
        alias : 'widget.winimportacao',
        title : 'Importação de Figuras Fiscais de ICMS/ICMS-ST',
        autoScroll : true,
        modal : true,
        closeAction : 'close',
        bodyPadding : 10,
        items : [ {
            xtype : 'form',
            border : false,
            width : 400,
            html : '<form id="arquivo" name="arquivo"> <input type="file" maxLength=2048 accept=".csv" size=2048 name="arquivo" id="arquivo" required/><label></br><b>Arquivo no formato .csv</b></label> </form>'
            /*
			 * items : [ { xtype : 'fileuploadfield', vtype : 'file', labelAlign : 'top', name : 'fileName', // id : 'fileName', multiple : false, acceptMimes : [ 'csv', 'zip' ], acceptSize : 2048,
			 * fieldLabel : 'Arquivo <span class="gray">(csv ou zip; até 2 MB)</span>', labelWidth : 50, msgTarget : 'side', allowBlank : false, anchor : '100%', buttonText : '...', } ]
			 */,

            buttons : [ {
                text : 'Importar',
                // action : 'importar',
                formBind : true,
                width : 110,
                iconCls : 'botoes-import',
                handler : function() {
	                // var form = this.up('form');
	                // var oform = this.up('form').getForm();
	                // var data = this.up('form');
	                 var oFileUpload = document.arquivo.arquivo;

	                if (oFileUpload.value != "" || oFileUpload.value != null) {
		                var form = document.getElementById("arquivo");

		                var XHR = new XMLHttpRequest();
		                var FD = new FormData(form);

		                XHR.addEventListener("load", function(response) {
			                var objRetorno = Ext.decode(response.target.responseText);
			                Ext.ux.Msg.flash({
			                    msg : objRetorno.mensagem,
			                    type : 'warning'
			                });
		                });
		                XHR.addEventListener("error", function(event) {
			                Ext.ux.Msg.flash({
			                    msg : 'Falha de comunicação com o servidor',
			                    type : 'error'
			                });
			                console.log('FALHA DE COMUNICAÇÃO COM O SERVIDOR');
			                console.log(event);
		                });
		                XHR.open("POST", "/Strbc/rs/ImportacaoNcm");
		                XHR.setRequestHeader("ticketAcesso", sessionStorage.getItem('ticketAcesso'));
		                XHR.send(FD);
	                } else {
		                Ext.ux.Msg.flash({
		                    msg : 'Selecione um arquivo.',
		                    type : 'error'
		                });
	                }
                }

            }, {
                text : 'Fechar',
                iconCls : 'botoes-close',
                width : 110,
                itemId : 'closewindow'
            } ]

        } ]
    });