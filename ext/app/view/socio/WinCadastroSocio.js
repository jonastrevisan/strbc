Ext.require(['Ext.ux.TextMaskPlugin'])
Ext.define('Strbc.view.socio.WinCadastroSocio', {
    extend: 'Ext.window.Window',
    alias: 'widget.wincadastrosocio',
    iconCls: 'botoes-export',
    title:'Cadastro de Sócios',
    modal: true,
    autoScroll: true,
    closeAction: 'close',
    width: 950,
    height: 550,
    items: [{
        xtype: 'form',
        layout: 'form', layout: 'anchor',
        bodyPadding: 10,
        fieldDefaults: {
            msgTarget: 'side'
        },

        defaultType: 'textfield',
        items: [{
            xtype: 'hiddenfield',
            name: 'cd_conta_pagar',
            margin: '0 3 3 0'
        },
        {
            xtype: 'fieldcontainer',
            layout: 'hbox',
            defaultType: 'textfield',

            items: [{
                name: 'matricula',
                margin: '0 3 3 0',
                fieldLabel: 'Matricula',
                allowBlank: false,
                flex: 1
            }, {
                xtype: 'datefield',
                name: 'admissao',
                margin: '0 3 3 0',
                fieldLabel: 'Admissão',
                flex: 1,
				 format: 'd/m/Y',
            }, {
                name: 'inscricao',
                margin: '0 3 3 0',
                fieldLabel: 'Inscrição Nº',
                flex: 1
            }]
        }, {
            xtype: 'container',
            layout: 'hbox',
            defaultType: 'textfield',

            items: [{
                fieldLabel: 'Nome',
                name: 'nome',
                allowBlank: false,
                margin: '0 3 3 0',
                flex: 1                
            }, ]

        }, {
            xtype: 'container',
            layout: 'hbox',
            defaultType: 'textfield',

            items: [{
                xtype: 'textfield',
                fieldLabel: 'Natural de',
                margin: '0 3 3 0',
                name: 'naturalidade',
                flex: 1
            }, {
                xtype: 'combo',
                fieldLabel: 'Estado',
                margin: '0 3 3 0',
                name: 'estado',
                flex: 1,
				store: new Ext.data.ArrayStore({
				   fields: [ 'estado', 'estadoDescricao'],
					data: [["AC", "AC"],["AL" ,"AL"],["AM" ,"AM"],["AP" ,"AP"],["BA" ,"BA"],["CE" ,"CE"],["DF" ,"DF"],["ES" ,"ES"],
["GO" ,"GO"],["MA" ,"MA"],["MG" ,"MG"],["MS" ,"MS"],["MT" ,"MT"],["PA" ,"PA"],["PB" ,"PB"],["PE" ,"PE"],["PI" ,"PI"],["PR" ,"PR"],["RJ" ,"RJ"],
["RN" ,"RN"],["RO" ,"RO"],["RR" ,"RR"],["RS" ,"RS"],["SC" ,"SC"],["SE" ,"SE"],["SP" ,"SP"],["TO" ,"TO"]]}),
				valueField: 'estado',
				 displayField: 'estadoDescricao'
            }, {
                xtype: 'combo',
                fieldLabel: 'Cidade Atual',
                margin: '0 3 3 0',
                name: 'cidadeatual',
                flex: 1,
				store: new Ext.data.ArrayStore({
				   fields: [ 'cidadeatual', 'cidadeatualDescricao'],
					data: [[1, 'Barracão - PR'],
					 [2, 'Bom Jesus do Sul - PR'],
					 [3, 'Dionisio Cerqueira - SC']]
					}),
				valueField: 'cidadeatual',
				 displayField: 'cidadeatualDescricao',
            }]

        }, {
            xtype: 'container',
            layout: 'hbox',
            defaultType: 'textfield',

            items: [{
                xtype: 'datefield',
                fieldLabel: 'Data Nascimento',
                name: 'datanascimento',
                labelWidth: 105,
                margin: '0 3 3 0',
                flex: 1, 
				format: 'd/m/Y'

            }, {
                xtype: 'combo',
                fieldLabel: 'Estado Civil',
                margin: '0 3 3 0',
                name: 'estcivil',
                flex: 1,
				store: new Ext.data.ArrayStore({
				   fields: [ 'estcivil', 'estcivilDescricao'],
					data: [['Casado(a)', 'Casado(a)'],
					 ['Solteiro(a)', 'Solteiro(a)'],
					 ['Separado(a)', 'Separado(a)'],
					 ['Divorciado(a)', 'Divorciado(a)'],
					 ['Viúvo(a)', 'Viúvo(a)']]
					}),
				valueField: 'estcivil',
				 displayField: 'estcivilDescricao',
            }, {
                xtype: 'combo',
                fieldLabel: 'Sexo',
                 store: new Ext.data.ArrayStore({
			   fields: [
			  'sexo',
			  'sexoDescricao',
			   ],
        		data: [['M', 'Masculino'], ['F', 'Feminino']]
				}),
				valueField: 'sexo',
				 displayField: 'sexoDescricao',
                margin: '0 3 3 0',
                allowBlank: false,
                name: 'sexo',
                flex: 1
            }]
        }, {
            xtype: 'container',
            layout: 'hbox',
            defaultType: 'textfield',

            items: [{
                fieldLabel: 'RG',
                name: 'rg',
                margin: '0 3 3 0',
                flex: 1

            }, {
                fieldLabel: 'Série',
                margin: '0 3 3 0',
                name: 'serie',
                flex: 1
            }, {
                fieldLabel: 'Pr. Social',
                margin: '0 3 3 0',
                name: 'prsocial',
                flex: 1
            }]

        }, {
            xtype: 'container',
            layout: 'hbox',
            defaultType: 'textfield',

            items: [{
                fieldLabel: 'CPF',
                name: 'cpf',
                margin: '0 3 3 0',
                flex: 1,
				  plugins: 'textmask',
                mask: '999.999.999-99',
               // money: true
                
            }, {
                fieldLabel: 'Certificado de Reservista n°',
                labelWidth: 180,
                margin: '0 3 3 0',
                name: 'certificadoreserv',
                flex: 1
            }]
        }, {

            xtype: 'fieldcontainer',
            layout: 'hbox',
            defaultType: 'textfield',
            items: [{
                name: 'pai',
                fieldLabel: 'Pai',
                flex: 1
                
            }, {
                xtype: 'textfield',
                name: 'nacionalidadepai',
                fieldLabel: 'Nacionalidade',
                flex: 1,
                margins: '0 3 3 0'

            }]
        }, {
            xtype: 'container',
            layout: 'hbox',
            defaultType: 'textfield',
            margin: '0 3 3 0',
            items: [{
                fieldLabel: 'Mãe',
                name: 'mae',
                flex: 1
            }, {
                xtype: 'textfield',
                fieldLabel: 'Nacionalidade',
                name: 'nacionalidademae'
            }]

        }, {
            xtype: 'fieldset',
            title: 'Propriedade 1',
            defaultType: 'textfield',
            layout: 'anchor',
            defaults: {
                anchor: '100%'
            },
            items: [{
                xtype: 'fieldcontainer',
                layout: 'hbox',
                defaultType: 'textfield',
                items: [{
                    name: 'propriedade1',
                    fieldLabel: 'Propriedade ',
                    flex: 1
                }, {
                    name: 'proprietario1',
                    fieldLabel: 'Proprietario ',
                    flex: 1,
                    margins: '0 3 3 0'
                                    }]
            }, {
                xtype: 'container',
                layout: 'hbox',
                defaultType: 'textfield',
                margin: '0 3 3 0',
                items: [{
                 xtype: 'combo',
                fieldLabel: 'Endereco',
                name: 'endereco1',
                store: 'Strbc.store.ComunidadesSocios',
				valueField: 'linha',
				displayField: 'linha',
				 queryMode: 'local',
                 typeAhead: true,
                margin: '0 3 3 0',
                flex:1
                }, {
                    xtype: 'datefield',
                    fieldLabel: 'Data Admissão',
                    flex: 1,
                    name: 'dataemissao1'
                }]
            }]
        }, {
            xtype: 'fieldset',
            title: 'Propriedade 2',
            defaultType: 'textfield',
            layout: 'anchor',
            defaults: {
                anchor: '100%'
            },
            items: [{
                xtype: 'fieldcontainer',
                layout: 'hbox',
                defaultType: 'textfield',
                items: [{
                    name: 'propriedade2',
                    fieldLabel: 'Propriedade',
                    flex: 1
                }, {
                    name: 'proprietario2',
                    fieldLabel: 'Proprietario',
                    flex: 1,
                    margins: '0 3 3 0'
                }]
            }, {
                xtype: 'container',
                layout: 'hbox',
                defaultType: 'textfield',
                margin: '0 3 3 0',
                items: [{
					 xtype: 'combo',
                    fieldLabel: 'Endereco',
                    name: 'endereco2',
                    flex: 1,
					store: 'Strbc.store.ComunidadesSocios',
				    valueField: 'linha',
				    displayField: 'linha', 
					queryMode: 'local',
                    typeAhead: true

                }, {
                    xtype: 'datefield',
                    fieldLabel: 'Data Admissão',
                    name: 'dataemissao2',
                    flex: 1
                }]
            }]
        }, {
            xtype: 'fieldset',
            title: 'Dependentes',
            defaultType: 'textfield',
            layout: 'anchor',
            defaults: {
                anchor: '100%'
            },
            items: [
             {
                 xtype: 'fieldcontainer',
                 layout: 'hbox',
                 defaultType: 'label',
                 align: 'middle',
                 items: [{
                     text: 'Nomes',
                     flex: 1
                 }, {
                     text: 'Parentesco',
                     flex: 1
                 }, {
                     text: 'Data Nascimento',
                     flex: 1
                 }]
             },
            {
                xtype: 'fieldcontainer',
                layout: 'hbox',
                defaultType: 'textfield',
                items: [{
                    name: 'nomedependente1',
                    margins: '0 3 3 0',
                    flex: 1,
                    
                }, {
                    name: 'parentesco1',
                    flex: 1,
                    margins: '0 3 3 0'
                }, {
                    xtype: 'datefield',
                    name: 'datanasc1',
                    flex: 1,
                    margins: '0 3 3 0'
                }]
            }, {
                xtype: 'container',
                layout: 'hbox',
                defaultType: 'textfield',
                margin: '0 3 3 0',
                items: [{
                    name: 'nomedependente2',
                    margins: '0 3 3 0',
                    flex: 1
                }, {
                    name: 'parentesco2',
                    margins: '0 3 3 0',
                    flex: 1
                }, {
                    xtype: 'datefield',
                    name: 'datanasc2',
                    margins: '0 3 3 0',
                    flex: 1
                }]
            }, {
                xtype: 'container',
                layout: 'hbox',
                defaultType: 'textfield',
                margin: '0 3 3 0',
                items: [{
                    name: 'nomedependente3',
                    margins: '0 3 3 0',
                    flex: 1
                }, {
                    name: 'parentesco3',
                    margins: '0 3 3 0',
                    flex: 1
                }, {
                    xtype: 'datefield',
                    name: 'datanasc3',
                    margins: '0 3 3 0',
                    flex: 1
                }]
            }, {
                xtype: 'container',
                layout: 'hbox',
                defaultType: 'textfield',
                margin: '0 3 3 0',
                items: [{
                    name: 'nomedependente4',
                    margins: '0 3 3 0',
                    flex: 1
                }, {
                    name: 'parentesco4',
                    margins: '0 3 3 0',
                    flex: 1
                }, {
                    xtype: 'datefield',
                    name: 'datanasc4',
                    margins: '0 3 3 0',
                    flex: 1
                }]
            }, {
                xtype: 'container',
                layout: 'hbox',
                defaultType: 'textfield',
                margin: '0 3 3 0',
                items: [{
                    name: 'nomedependente5',
                    margins: '0 3 3 0',
                    flex: 1
                }, {
                    name: 'parentesco5',
                    margins: '0 3 3 0',
                    flex: 1
                }, {
                    xtype: 'datefield',
                    name: 'datanasc5',
                    margins: '0 3 3 0',
                    flex: 1
                }]
            }]
        }]
    }],
    buttons: [{
        text: 'Salvar',
        action: 'salvar'
    }, {
        text: 'Cancelar',
        action: 'fechar'
    }]
});
