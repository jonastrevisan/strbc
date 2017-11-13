var objCriarTab = Ext.create('Strbc.util.CriarTab');
Ext.define('Strbc.controller.socio.Socios', {
	extend: 'Ext.app.Controller',
	stores: ['Strbc.store.Socios', 'Strbc.store.Mensalidades', 'Strbc.store.ComunidadesSocios'],

	//storeGrid: Ext.create('Strbc.store.Socios'),
	views: ['socio.List', 'socio.WinCadastroSocio', 'mensalidades.Mensalidade', 'mensalidades.Win_cad_ano', 'mensalidades.Win_mensalidade'],

	refs: [{
				ref: 'ncmsList',
				selector: 'ncmslist'
			}, {
				ref: 'winexportacao',
				selector: 'winexportacao'
			}, {
				ref: 'winimportacao',
				selector: 'winimportacao'
			}, {
				ref: 'ncmsList',
				selector: 'ncmslist'
			}, {
				ref: 'storepesquisas',
				selector: 'storepesquisas'
			}, {
				ref: 'stmensalidades',
				selector: 'stmensalidades'
			}, {
				ref: 'stSocios',
				selector: 'Strbc.store.Socios'
			}

	],

	init: function() {

		this.control({
				'wincadano button[action=salvarano]': {
					click: this.SalvarAno
				},
				'wincadano textfield[name=ano]': {
					blur: this.VerificaSeExisteAno
				},
				'winmensalidade button[action=salvar]': {
					click: this.SalvarEdicaoMensalidade
				},
				'winfinanceiroentrada button[action=salvar]': {
					click: this.SalvarFinanceiroEntrada
				},
				'wincategoriafinanceiro button[action=salvar]': {
					click: this.SalvarCategoriaFinanceiro
				},
				'gridmensalidades button[action=novo]': {
					click: this.NovoAno
				},
				'gridmensalidades actioncolumn': {
					click: this.actionColuna
				},
				'ncmslist button[action=novosocio]': {
					click: this.winNovoSocio
				},
				'ncmslist actioncolumn': {
					click: this.columnaAction_Grid_Socio
				},
				'wincadastrosocio button[action=salvar]': {
					click: this.salvarSocio
				},
				'wincadastrosocio button[action=fechar]': {
					click: this.fecharWindowCadastroSocio
				},
				'wincadastrosocio textfield[name=matricula]': {
					blur: this.verificaExixteMatricula
				}
			});
	},

	VerificaSeExisteAno: function(text) {
		var ano = text.rawValue;
		var objData = this.getStrbcStoreMensalidadesStore().findRecord('ano', ano);
		if (objData != null) {
			Ext.ux.Msg.flash({
					title: 'Atenção!',
					msg: 'O ano ' + ano + ' já está cadastrado para este sócio.',
					type: 'error'
				});
			text.setRawValue('');
		}

	},
	SalvarAno: function(button) {
		var me = this;
		var win = button.up('window');
		form = win.down('form');
		// rec = form.getRecord(),
		if (form.isValid()) {
			var values = form.getValues();
			var situacao;
			var data;
			if (values.anotodo == 'on') {
				situacao = 'pago'
				data = new Date()
			} else {
				situacao = 'aberto'
				data = '0000-00-00'
			}

			Ext.Ajax.request({
					method: 'POST',
					url: 'php/mensalidade/cadastroAnos.php',
					params: {
						matricula: values.matricula,
						ano: values.ano,
						valor: values.valor,
						situacao: situacao,
						datapagto: data
					},
					success: function(input, obj) {debugger
						var datas = Ext.decode(input.responseText);
						if (datas.success) {
							win.close();
							Ext.ux.Msg.flash({
									title: 'Sucesso',
									msg: 'Ano cadastrado com sucesso.',
									type: 'success'
								});
							Ext.Ajax.request({
									method: 'POST',
									url: 'php/mensalidade/mensalidade.php',
									params: {
										acao: 'buscar',
										matricula: values.matricula
									},
									success: function(input, obj) {
										var datas = Ext.decode(input.responseText);
										if (datas.success) {

											//var storeMensalidades = Ext.getCmp('gridmensalidade').getStore();
											var st = me.getStrbcStoreMensalidadesStore();
											st.loadData(datas.data);

										}
									},
									failure: function(response) {debugger
										Ext.ux.Msg.flash({
												title: 'Conexao!',
												msg: 'Falha de comunicação com o servidor.',
												type: 'error'
											});
									}
								});

						}
					},
					failure: function(response) {debugger
						Ext.ux.Msg.flash({
								title: 'Conexao!',
								msg: 'Falha de comunicação com o servidor.',
								type: 'error'
							});
					}
				});

		}
	},
	SalvarEdicaoMensalidade: function(button) {
		var me = this;
		var store = me.getStrbcStoreMensalidadesStore();
		var win = button.up('window');
		form = win.down('form');

		if (form.isValid()) {
			values = form.getValues();
			var valor = values.valor.replace('.', ''), valor = valor.replace('.', ''), valor = valor.replace('.', ''), valor = valor.replace('.', ''), valor = valor
				.replace('.', ''), valor = valor.replace(',', '.')
			Ext.Ajax.request({
					method: 'POST',
					url: 'php/mensalidade/mensalidade.php',
					params: {
						acao: 'editarvalormensalidade',
						idpagto: values.idpagto,
						valor: valor
					},
					success: function(input, obj) {
						var retorno = Ext.decode(input.responseText);
						if (retorno.success) {
							var valor = values.valor.replace('.', ''), valor = valor.replace('.', ''), valor = valor.replace('.', ''), valor = valor
								.replace('.', ''), valor = valor.replace('.', ''), valor = valor.replace('.', ''), valor = valor.replace(',', '.')
							var valores = store.findRecord("idpagto", values.idpagto);
							valores.set({
									'valor': valor
								});
							store.commitChanges();
							win.close();

							Ext.ux.Msg.flash({
									title: 'Sucesso!',
									msg: 'Valor da mensalidades alterado com sucesso',
									type: 'success'
								});

						}
					},
					failure: function(response) {
						Ext.ux.Msg.flash({
								title: 'Conexao!',
								msg: 'Falha de comunicação com o servidor.',
								type: 'error'
							});
					}
				});
		}
	},
	SalvarFinanceiroEntrada: function(button) {
		var win = button.up('window');
		form = win.down('form');
		if (form.isValid()) {
			values = form.getValues();
			Ext.Msg.confirm('Atenção', 'Deseja realmente dar Baixa neste documento?', function(btn) {
					if (btn == 'yes') {
						Ext.Ajax.request({
								method: 'POST',
								url: 'php/mensalidade/mensalidade.php',
								params: {
									acao: 'editarvalormensalidade',
									idpagto: objData.data.idpagto

								},
								success: function(input, obj) {
									var data = Ext.decode(input.responseText);
									if (data.success) {
										Ext.Ajax.request({
												method: 'POST',
												url: 'php/mensalidade/mensalidade.php',
												params: {
													acao: 'buscar',
													matricula: objData.data.matricula
												},
												success: function(input, obj) {
													var data = Ext.decode(input.responseText);
													if (data.success) {
														var storeMensalidades = me.getStrbcStoreMensalidadesStore();
														view.getStore().loadData(data.data);
													}
												},
												failure: function(response) {
													Ext.ux.Msg.flash({
															title: 'Conexao!',
															msg: 'Falha de comunicação com o servidor.',
															type: 'error'
														});
												}
											});
									}
								},
								failure: function(response) {
									Ext.ux.Msg.flash({
											title: 'Conexao!',
											msg: 'Falha de comunicação com o servidor.',
											type: 'error'
										});
								}
							});
					}
				});
		}

	},
	SalvarCategoriaFinanceiro: function() {
		alert('salvar cat')
	},
	NovoAno: function() {
		var me = this;
		var win = Ext.widget('wincadano').show();
		var store = me.getStrbcStoreMensalidadesStore();

		var form = win.down('form');
		form.getForm().findField('matricula').setValue(store.id);
	},

	actionColuna: function(view, cell, row, col, e) {
		var me = this;
		var acao = e.getTarget().dataset.qtip;
		var objData = this.getStrbcStoreMensalidadesStore().getAt(row);

		if (acao) {
			switch (acao) {
				case 'Detalhar|Editar':
					var window = Ext.widget('winmensalidade').show();
					var form = window.down('form');
					console.log(objData);
					form.loadRecord(objData);
					break;
				case 'Estornar':
					Ext.Msg.confirm('Atenção', 'Deseja realmente Estornar este documento?', function(btn) {
							if (btn == 'yes') {
								Ext.Ajax.request({
										method: 'POST',
										url: 'php/mensalidade/mensalidade.php',
										params: {
											acao: 'estornardocumento',
											idpagto: objData.data.idpagto
										},
										success: function(input, obj) {
											var data = Ext.decode(input.responseText);
											if (data.success) {
												Ext.Ajax.request({
														method: 'POST',
														url: 'php/mensalidade/mensalidade.php',
														params: {
															acao: 'buscar',
															matricula: objData.data.matricula
														},
														success: function(input, obj) {
															var data = Ext.decode(input.responseText);
															if (data.success) {
																var storeMensalidades = me.getStrbcStoreMensalidadesStore();
																view.getStore().loadData(data.data);
																Ext.ux.Msg.flash({
																		title: 'Sucesso!',
																		msg: 'Estorno realizado',
																		type: 'success'
																	});
															}
														},
														failure: function(response) {
															Ext.ux.Msg.flash({
																	title: 'Conexao!',
																	msg: 'Falha de comunicação com o servidor.',
																	type: 'error'
																});
														}
													});
											}
										},
										failure: function(response) {
											Ext.ux.Msg.flash({
													title: 'Conexao!',
													msg: 'Falha de comunicação com o servidor.',
													type: 'error'
												});
										}
									});
							}
						});
					break;
				case 'Dar Baixa':
					Ext.Msg.confirm('Atenção', 'Deseja realmente dar Baixa neste documento?', function(btn) {
							if (btn == 'yes') {
								var now = new Date();
								Ext.Ajax.request({
										method: 'POST',
										url: 'php/mensalidade/mensalidade.php',
										params: {
											acao: 'baixadocumento',
											idpagto: objData.data.idpagto,
											datapagto: now
										},
										success: function(input, obj) {
											var data = Ext.decode(input.responseText);
											if (data.success) {
												Ext.Ajax.request({
														method: 'POST',
														url: 'php/mensalidade/mensalidade.php',
														params: {
															acao: 'buscar',
															matricula: objData.data.matricula
														},
														success: function(input, obj) {
															var data = Ext.decode(input.responseText);
															if (data.success) {
																var storeMensalidades = me.getStrbcStoreMensalidadesStore();
																view.getStore().loadData(data.data);
																Ext.ux.Msg.flash({
																		title: 'Sucesso!',
																		msg: 'Baixa realizada com sucesso',
																		type: 'success'
																	});
															}
														},
														failure: function(response) {
															Ext.ux.Msg.flash({
																	title: 'Conexao!',
																	msg: 'Falha de comunicação com o servidor.',
																	type: 'error'
																});
														}
													});
											}
										},
										failure: function(response) {
											Ext.ux.Msg.flash({
													title: 'Conexao!',
													msg: 'Falha de comunicação com o servidor.',
													type: 'error'
												});
										}
									});
							}
						});
					break;
			}
		}
	}

	,
	fecharWindowCadastroSocio: function(btn) {
		btn.up('window').close();
	},
	salvarSocio: function(btn) {
		var win = btn.up('window');
		var form = win.down('form').getForm();
		var store = this.getStrbcStoreSociosStore();
		if (form.isValid()) {
			form.submit({
					url: 'php/socio/cadastroSocio.php',
					success: function(fp, response) {
						win.close();
						Ext.ux.Msg.flash({
								title: 'Aviso!',
								msg: 'Salvo com sucesso',
								type: 'success'
							});
						store.load();
					},
					error: function() {
						Ext.ux.Msg.flash({
								title: 'Aviso!',
								msg: 'Houve um erro ao salvar',
								type: 'error'
							});
					}
				});
		} else {
			Ext.ux.Msg.flash({
					title: 'Aviso.',
					msg: 'Formulario invalido.',
					type: 'warning'
				});
		}
	},
	winNovoSocio: function() {
		var win = Ext.widget('wincadastrosocio');
		win.show();
	},
	verificaExixteMatricula: function(campo) {
		Ext.Ajax.request({
				method: 'POST',
				url: 'php/socio/verificaMatricula.php',
				params: {
					matricula: campo.rawValue
				},
				success: function(input, obj) {
					var data = Ext.decode(input.responseText);
					if (data.success) {

					} else {
						Ext.ux.Msg.flash({
								title: 'Aviso!',
								msg: 'Matricula <b>' + campo.rawValue + '</b> já existente, em nome de: ' + '<b>' + data.data + '</b>',
								type: 'error'
							});
						campo.setRawValue('');
					}
				},
				failure: function(response) {
					Ext.ux.Msg.flash({
							title: 'Conexao!',
							msg: 'Falha de comunicação com o servidor.',
							type: 'error'
						});
				}
			});

	},

	columnaAction_Grid_Socio: function(view, cell, row, col, e) {
		var acao = e.getTarget().dataset.qtip;
		var me = this;
		var store = this.getStrbcStoreSociosStore();
		var objData = store.getAt(row);

		if (acao) {
			switch (acao) {
				case 'Desfiliar':
					Ext.Msg.confirm('Atencao', 'Deseja realmente Desfiliar <b>' + objData.data.nome + '</b>?', function(id, value) {
							if (id === 'yes') {
								Ext.Ajax.request({
										method: 'POST',
										url: 'php/socio/desfiliar.php',
										params: {
											data: Ext.encode(objData.data)
										},
										success: function(input, obj) {
											var data = Ext.decode(input.responseText);
											if (data.success) {
												store.remove(objData);
												//store.load();
												Ext.ux.Msg.flash({
														title: 'Aviso!',
														msg: objData.data.nome + ', desfiliado',
														type: 'success'
													});
											} else {
												Ext.ux.Msg.flash({
														title: 'Atencao!',
														msg: 'Houve um erro ao desfiliar ' + objData.data.nome,
														type: 'error'
													});
											}
										},
										failure: function(response) {
											Ext.ux.Msg.flash({
													title: 'Conexao!',
													msg: 'Falha de comunicação com o servidor.',
													type: 'error'
												});
										}
									});
							}
						}, this);

					break;
				case 'Editar/Detalhar':
					var win = Ext.widget('wincadastrosocio');
					win.title = "Editando Sócio";
					var form = win.down('form');
					form.loadRecord(objData);
					win.show();

					break;
				case 'Imprimir':
					objCriarTab.AbrirPagina('socio' + objData.data.nome, 'Sócio :' + objData.data.nome,
						'http://localhost:82/sindicato/php/vendosocio.php?selecionado=m1&matricula1=' + objData.data.matricula + '&tipopesquisa=edicao');

					break;
				case 'Carteira':
					objCriarTab.AbrirPagina('carteira' + objData.data.nome, 'Cartera Sócio :' + objData.data.nome,
						'http://localhost:82/sindicato/php/carteira.php?selecionado=m1&matricula1=' + objData.data.matricula);

					break;
				case 'Mensalidades':
					Ext.Ajax.request({
							method: 'POST',
							url: 'php/mensalidade/mensalidade.php',
							params: {
								acao: 'buscar',
								matricula: objData.data.matricula
							},
							success: function(input, obj) {
								var data = Ext.decode(input.responseText);
								if (data.success) {
									if (objCriarTab.NovaTab('mensalidadess' + objData.data.nome, objData.data.nome, 'gridmensalidades')) {
										var storeMensalidades = me.getStrbcStoreMensalidadesStore();

										storeMensalidades.loadData(data.data);
										var MatriculaSocio = {
											'matriculaSocio': objData.data.matricula
										};
										storeMensalidades.id = objData.data.matricula;
									};

								}
							},
							failure: function(response) {
								Ext.ux.Msg.flash({
										title: 'Conexao!',
										msg: 'Falha de comunicação com o servidor.',
										type: 'error'
									});
							}
						});
					break;
			}
		}
	}

});
