<div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li>
                            <a href="#"><img src="<?php echo base_url('assets/pic/blue-user-icon.png');?>" height="52px" width="52px"> <?php echo USER_NAME;?></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="<?php echo site_url('auth/logout');?>"><i class="fa fa-lock"></i> Logout</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
							<ul class="nav nav-second-level">
								<li>
									<a href="<?php echo site_url('dashboard');?>"><i class="fa fa-dashboard fa-fw"></i> Dashboard 2016</a>
								</li>
								<li>
									<a href="<?php echo site_url('dashboard_2015');?>"><i class="fa fa-dashboard fa-fw"></i> Dashboard 2015</a>
								</li>
							</ul>
                        </li>
                        <li>
                            <a href="#"><i class="glyphicon glyphicon-folder-close fa-fw"></i> Master Data<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="#"><i class="fa fa-truck"></i> TRANSPORT<span class="fa arrow"></span></a>
                                    <ul class="nav nav-third-level">
										<li>
                                            <a href="<?php echo site_url('transport_cilacap');?>"> CILACAP</a>
                                        </li>
										<li>
                                            <a href="<?php echo site_url('transport_cilegon');?>"> CILEGON</a>
                                        </li>
                                        <li>
                                            <a href="<?php echo site_url('transport_dump_truck');?>"> DUMP TRUCK</a>
                                        </li>
                                        <li>
                                            <a href="<?php echo site_url('transport_narogong');?>"> NAROGONG</a>
                                        </li>
                                        <li>
                                            <a href="<?php echo site_url('transport_warehouse');?>"> WAREHOUSE</a>
                                        </li>
										<li>
                                            <a href="<?php echo site_url('transport_mu');?>"> MU</a>
                                        </li>
									</ul>
                                </li>
                                <li>
                                    <a href="#"><i class="fa fa-truck"></i> WAREHOUSE<span class="fa arrow"></span></a>
                                    <ul class="nav nav-third-level">
										<li>
                                            <a href="#"> HOLCIM<span class="fa arrow"></span></a>
                                            <ul class="nav nav-third-level">
												<li>
													<a href="<?php echo site_url('warehouse/holcim_tangerang');?>"><i class="fa fa-building"></i> TANGERANG</a>
												</li>
												<li>
													<a href="<?php echo site_url('warehouse/holcim_serpong');?>"><i class="fa fa-building"></i> SERPONG</a>
												</li>
												<li>
													<a href="<?php echo site_url('warehouse/holcim_rawalumbu');?>"><i class="fa fa-building"></i> RAWALUMBU</a>
												</li>
												<li>
													<a href="<?php echo site_url('warehouse/holcim_joglo');?>"><i class="fa fa-building"></i> JOGLO</a>
												</li>
												<li>
													<a href="<?php echo site_url('warehouse/holcim_karawang');?>"><i class="fa fa-building"></i> KARAWANG</a>
												</li>
												<li>
													<a href="<?php echo site_url('warehouse/holcim_sepale');?>"><i class="fa fa-building"></i> SEPALE</a>
												</li>
												<li>
													<a href="<?php echo site_url('warehouse/holcim_brumbung');?>"><i class="fa fa-building"></i> BRUMBUNG</a>
												</li>
												<li>
													<a href="<?php echo site_url('warehouse/holcim_lempuyangan');?>"><i class="fa fa-building"></i> LEMPUYANGAN</a>
												</li>
												<li>
													<a href="<?php echo site_url('warehouse/holcim_balapan');?>"><i class="fa fa-building"></i> BALAPAN</a>
												</li>
												<li>
													<a href="<?php echo site_url('warehouse/holcim_purwosari');?>"><i class="fa fa-building"></i> PURWOSARI</a>
												</li>
												<li>
													<a href="<?php echo site_url('warehouse/holcim_sragen');?>"><i class="fa fa-building"></i> SRAGEN</a>
												</li>
												<li>
													<a href="<?php echo site_url('warehouse/holcim_klaten');?>"><i class="fa fa-building"></i> KLATEN</a>
												</li>
												<li>
													<a href="<?php echo site_url('warehouse/holcim_wonosari');?>"><i class="fa fa-building"></i> WONOSARI</a>
												</li>
												<li>
													<a href="<?php echo site_url('warehouse/holcim_romokalisari');?>"><i class="fa fa-building"></i> ROMOKALISARI</a>
												</li>
												<li>
													<a href="<?php echo site_url('warehouse/holcim_banyuwangi');?>"><i class="fa fa-building"></i> BANYUWANGI</a>
												</li>
												<li>
													<a href="<?php echo site_url('warehouse/holcim_celukan_bawang');?>"><i class="fa fa-building"></i> CELUKAN BAWANG</a>
												</li>
											</ul>
                                        </li>
                                        <li>
                                            <a href="#"> BSI<span class="fa arrow"></span></a>
                                            <ul class="nav nav-third-level">
												<li>
													<a href="<?php echo site_url('warehouse/bsi_cibitung');?>"><i class="fa fa-building"></i> CIBITUNG</a>
												</li>
												<li>
													<a href="<?php echo site_url('warehouse/bsi_kretek');?>"><i class="fa fa-building"></i> KRETEK</a>
												</li>
											</ul>
                                        </li>
                                        <li>
                                            <a href="<?php echo site_url('warehouse/mu');?>"> MU</a>
                                        </li>
                                        <li>
                                            <a href="<?php echo site_url('warehouse/cilegon');?>"> CILEGON</a>
                                        </li>
									</ul>
                                </li>
                                <li>
                                    <a href="#"><i class="fa fa-truck"></i> PACKAGING<span class="fa arrow"></span></a>
                                    <ul class="nav nav-third-level">
										<li>
                                            <a href="<?php echo site_url('packaging/bsi');?>"> BSI</a>
                                        </li>
                                        <li>
                                            <a href="<?php echo site_url('packaging/crm');?>"> CRM</a>
                                        </li>
                                        <li>
                                            <a href="<?php echo site_url('packaging/latinusa');?>"> LATINUSA</a>
                                        </li>
                                        <li>
                                            <a href="<?php echo site_url('packaging/posco');?>"> POSCO</a>
                                        </li>
									</ul>
                                </li>
                                <li>
                                    <a href="<?php echo site_url('freight_forwarding');?>"><i class="fa fa-road"></i> FREIGHT FORWARDING</a>
                                </li>
                            </ul>
                        </li>
						<li>
                            <a href="<?php echo site_url('pica');?>"><i class="fa fa-road"></i> PICA</a>
                        </li>
                        <li>
                            <a href="#"><i class="glyphicon glyphicon-folder-close fa-fw"></i> REPORT<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="#"><i class="fa fa-truck"></i> TRANSPORT<span class="fa arrow"></span></a>
                                    <ul class="nav nav-third-level">
										<li>
                                            <a href="<?php echo site_url('report/transport_all');?>"> TRANSPORT ALL</a>
                                        </li>
                                        <li>
                                            <a href="<?php echo site_url('report/transport_cilacap');?>"> CILACAP</a>
                                        </li>
										<li>
                                            <a href="<?php echo site_url('report/transport_cilegon');?>"> CILEGON</a>
                                        </li>
                                        <li>
                                            <a href="<?php echo site_url('report/transport_dump_truck');?>"> DUMP TRUCK</a>
                                        </li>
                                        <li>
                                            <a href="<?php echo site_url('report/transport_narogong');?>"> NAROGONG</a>
                                        </li>
                                        <li>
                                            <a href="<?php echo site_url('report/transport_warehouse');?>"> WAREHOUSE</a>
                                        </li>
										<li>
                                            <a href="<?php echo site_url('report/transport_mu');?>"> MU</a>
                                        </li>
									</ul>
                                </li>
                                <li>
                                    <a href="#"><i class="fa fa-truck"></i> WAREHOUSE<span class="fa arrow"></span></a>
                                    <ul class="nav nav-third-level">
										<li>
                                            <a href="<?php echo site_url('report/warehouse_all');?>"> WAREHOUSE ALL</a>
                                        </li>
										<li>
                                            <a href="<?php echo site_url('report/warehouse_holcim');?>"> HOLCIM<span class="fa arrow"></span></a>
                                            <ul class="nav nav-third-level">
												<li>
													<a href="<?php echo site_url('report/warehouse_holcim');?>"> HOLCIM ALL</a>
												</li>
												<li>
													<a href="<?php echo site_url('report/warehouse_holcim_tangerang');?>"> TANGERANG</a>
												</li>
												<li>
													<a href="<?php echo site_url('report/warehouse_holcim_serpong');?>"> SERPONG</a>
												</li>
												<li>
													<a href="<?php echo site_url('report/warehouse_holcim_joglo');?>"> JOGLO</a>
												</li>
												<li>
													<a href="<?php echo site_url('report/warehouse_holcim_sepale');?>"> SEPALE</a>
												</li>
												<li>
													<a href="<?php echo site_url('report/warehouse_holcim_rawalumbu');?>"> RAWALUMBU</a>
												</li>
												<li>
													<a href="<?php echo site_url('report/warehouse_holcim_karawang');?>"> KARAWANG</a>
												</li>
												<li>
													<a href="<?php echo site_url('report/warehouse_holcim_brumbung');?>"> BRUMBUNG</a>
												</li>
												<li>
													<a href="<?php echo site_url('report/warehouse_holcim_poncol');?>"> PONCOL</a>
												</li>
												<li>
													<a href="<?php echo site_url('report/warehouse_holcim_lempuyangan');?>"> LEMPUYANGAN</a>
												</li>
												<li>
													<a href="<?php echo site_url('report/warehouse_holcim_wonosari');?>"> WONOSARI</a>
												</li>
												<li>
													<a href="<?php echo site_url('report/warehouse_holcim_klaten');?>"> KLATEN</a>
												</li>
												<li>
													<a href="<?php echo site_url('report/warehouse_holcim_balapan');?>"> BALAPAN</a>
												</li>
												<li>
													<a href="<?php echo site_url('report/warehouse_holcim_purwosari');?>"> PURWOSARI</a>
												</li>
												<li>
													<a href="<?php echo site_url('report/warehouse_holcim_sragen');?>"> SRAGEN</a>
												</li>
												<li>
													<a href="<?php echo site_url('report/warehouse_holcim_romokalisari');?>"> ROMOKALISARI</a>
												</li>
												<li>
													<a href="<?php echo site_url('report/warehouse_holcim_banyuwangi');?>"> BANYUWANGI</a>
												</li>
												<li>
													<a href="<?php echo site_url('report/warehouse_holcim_celukan_bawang');?>"> CELUKAN BAWANG</a>
												</li>
											</ul>
                                        </li>
                                        <li>
                                            <a href="<?php echo site_url('report/warehouse_bsi');?>"> BSI<span class="fa arrow"></span></a>
                                            <ul class="nav nav-third-level">
												<li>
													<a href="<?php echo site_url('report/warehouse_bsi');?>"> BSI ALL</a>
												</li>
												<li>
													<a href="<?php echo site_url('report/warehouse_bsi_cibitung');?>"> BSI CIBITUNG</a>
												</li>
												<li>
													<a href="<?php echo site_url('report/warehouse_bsi_kretek');?>"> BSI KRETEK</a>
												</li>
											</ul>
                                        </li>
                                        <li>
                                            <a href="<?php echo site_url('report/warehouse_cilegon');?>"> CILEGON</a>
                                        </li>
                                        <li>
                                            <a href="<?php echo site_url('report/warehouse_mu');?>"> MU</a>
                                        </li>
									</ul>
                                </li>
                                <li>
                                    <a href="#"><i class="fa fa-truck"></i> PACKAGING<span class="fa arrow"></span></a>
                                    <ul class="nav nav-third-level">
										<li>
                                            <a href="<?php echo site_url('report/packaging_all');?>"> PACKAGING ALL</a>
                                        </li>
                                        <li>
                                            <a href="<?php echo site_url('report/packaging_crm');?>"> CRM</a>
                                        </li>
                                        <li>
                                            <a href="<?php echo site_url('report/packaging_bsi');?>"> BSI</a>
                                        </li>
                                        <li>
                                            <a href="<?php echo site_url('report/packaging_latinusa');?>"> LATINUSA</a>
                                        </li>
                                        <li>
                                            <a href="<?php echo site_url('report/packaging_posco');?>"> POSCO</a>
                                        </li>
									</ul>
                                </li>
                                <li>
                                    <a href="<?php echo site_url('report/freight_forwarding');?>"><i class="fa fa-road"></i> FREIGHT FORWARDING</a>
                                </li>
								<li>
                                    <a href="<?php echo site_url('report/pica');?>"><i class="fa fa-road"></i> PICA</a>
                                </li>
								<li>
                                    <a href="<?php echo site_url('report/man_power');?>"><i class="fa fa-road"></i> MAN POWER</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#"><i class="glyphicon glyphicon-folder-close fa-fw"></i> REPORT SEMEN PECAH<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="#"><i class="fa fa-truck"></i> TRANSPORT<span class="fa arrow"></span></a>
                                    <ul class="nav nav-third-level">
                                        <li>
                                            <a href="<?php echo site_url('report_semen_pecah/transport_narogong');?>"> NAROGONG</a>
                                        </li>
                                        <li>
                                            <a href="<?php echo site_url('report_semen_pecah/transport_warehouse');?>"> WAREHOUSE</a>
                                        </li>
									</ul>
                                </li>
                                <li>
                                    <a href="#"><i class="fa fa-truck"></i> WAREHOUSE<span class="fa arrow"></span></a>
                                    <ul class="nav nav-third-level">
												<li>
													<a href="<?php echo site_url('report_semen_pecah/warehouse_holcim_tangerang');?>"> TANGERANG</a>
												</li>
												<li>
													<a href="<?php echo site_url('report_semen_pecah/warehouse_holcim_serpong');?>"> SERPONG</a>
												</li>
												<li>
													<a href="<?php echo site_url('report_semen_pecah/warehouse_holcim_joglo');?>"> JOGLO</a>
												</li>
												<li>
													<a href="<?php echo site_url('report_semen_pecah/warehouse_holcim_sepale');?>"> SEPALE</a>
												</li>
												<li>
													<a href="<?php echo site_url('report_semen_pecah/warehouse_holcim_rawalumbu');?>"> RAWALUMBU</a>
												</li>
												<li>
													<a href="<?php echo site_url('report_semen_pecah/warehouse_holcim_karawang');?>"> KARAWANG</a>
												</li>
												<li>
													<a href="<?php echo site_url('report_semen_pecah/warehouse_holcim_brumbung');?>"> BRUMBUNG</a>
												</li>
												<li>
													<a href="<?php echo site_url('report_semen_pecah/warehouse_holcim_poncol');?>"> PONCOL</a>
												</li>
												<li>
													<a href="<?php echo site_url('report_semen_pecah/warehouse_holcim_lempuyangan');?>"> LEMPUYANGAN</a>
												</li>
												<li>
													<a href="<?php echo site_url('report_semen_pecah/warehouse_holcim_wonosari');?>"> WONOSARI</a>
												</li>
												<li>
													<a href="<?php echo site_url('report_semen_pecah/warehouse_holcim_klaten');?>"> KLATEN</a>
												</li>
												<li>
													<a href="<?php echo site_url('report_semen_pecah/warehouse_holcim_balapan');?>"> BALAPAN</a>
												</li>
												<li>
													<a href="<?php echo site_url('report_semen_pecah/warehouse_holcim_purwosari');?>"> PURWOSARI</a>
												</li>
												<li>
													<a href="<?php echo site_url('report_semen_pecah/warehouse_holcim_sragen');?>"> SRAGEN</a>
												</li>
												<li>
													<a href="<?php echo site_url('report_semen_pecah/warehouse_holcim_romokalisari');?>"> ROMOKALISARI</a>
												</li>
												<li>
													<a href="<?php echo site_url('report_semen_pecah/warehouse_holcim_banyuwangi');?>"> BANYUWANGI</a>
												</li>
												<li>
													<a href="<?php echo site_url('report_semen_pecah/warehouse_holcim_celukan_bawang');?>"> CELUKAN BAWANG</a>
												</li>
											</ul>
									</ul>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
