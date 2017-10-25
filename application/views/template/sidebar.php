<!-- BEGIN CONTAINER -->
<div class="page-container">
	<!-- BEGIN SIDEBAR -->
	<div class="page-sidebar-wrapper">
		<div class="page-sidebar navbar-collapse collapse">
			<!-- BEGIN SIDEBAR MENU -->
			<ul class="page-sidebar-menu fixed" data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
				<?php 
							//if(USER_ID==24){
								//echo "SELECT a.* FROM master.menu a, master.users_menu b WHERE b.`menu` = a.`id` AND a.level = 1 AND b.`user_id` = '".USER_ID."'";
								$query = $this->DB->query("SELECT a.* FROM master.menu a, master.users_menu b WHERE b.`menu` = a.`id` AND a.level = 1 AND b.`user_id` = '".USER_ID."' AND a.app = '".$this->commons->getAPP()."' order by menu");
			
								if ($query->num_rows() > 0)
								{
									$level1 = $query->result_array(); 
								}
								else $level1 = array();
								
								$category = "";
								
								//die(print_r($level1));
								
								foreach($level1 as $menu => $items){
									$id = $level1[$menu]['id'];
						
									$is_header = false;
									
									if($level1[$menu]['type']=="header") $is_header = true;
										
									if($is_header == true){
										//punya submenu 
										
										
										//if($level1[$menu]['level']==1){
						?>
								<li>
									<a ><i class="<?php echo $level1[$menu]['icon'];?>"></i><span class="title"> <?php echo ucwords($level1[$menu]['menu_name']); ?></span><i class="fa fa-angle-left pull-right"></i></a>
									
									<ul class="sub-menu">
						<?php
										
										$query = $this->DB->query("SELECT a.* FROM master.menu a, master.users_menu b WHERE b.`menu` = a.`id` AND level > 1 AND b.`user_id` = '".USER_ID."' AND a.app = '".$this->commons->getAPP()."' order by menu");
			
										if ($query->num_rows() > 0)
										{
											$level2 = $query->result_array(); 
										}
										else $level2 = array();
										
										$level2a = $level2;
										//}
										//else{
											
											foreach($level2 as $menu2 => $items2){
												$sub_id = $level2[$menu2]['id'];
												$header_id = ($level2[$menu2]['header_id'] == null || $level2[$menu2]['header_id'] == "") ? "" : $level2[$menu2]['header_id'];
												//menu level 2,3,4,dst
												if($header_id==$id){
													
													$is_header = false;
													
													if($level2[$menu2]['type']=="header") $is_header = true;
														
													if($is_header == true){
							?>
										<li>	
											<a><i class="<?php echo $level2[$menu2]['icon'];?>"></i><span class="title"> <?php echo ucwords($level2[$menu2]['menu_name']); ?></span></a>
											<ul class="sub-menu">
							<?php
							
														$query = $this->DB->query("SELECT a.* FROM master.menu a, master.users_menu b WHERE b.`menu` = a.`id` AND level > 2 AND b.`user_id` = '".USER_ID."' AND a.app = '".$this->commons->getAPP()."' order by menu");
					
														if ($query->num_rows() > 0)
														{
															$level3 = $query->result_array(); 
														}
														else $level3 = array();
														
														$level3a = $level3;
														
														foreach($level3 as $menu3 => $items3){
															//$sub_id = $level2[$menu2]['id'];
															$header_id = ($level3[$menu3]['header_id'] == null || $level3[$menu3]['header_id'] == "") ? "" : $level3[$menu3]['header_id'];
															//menu level 2,3,4,dst
															if($header_id==$sub_id){
																
																$is_header = false;
																
																if($level3[$menu3]['type']=="header") $is_header = true;
																	
																if($is_header == true){
										
															
																}
																elseif($level3[$menu3]['level']==3){
							?>
												<li><a  href="<?php echo base_url().$level3[$menu3]['link_menu']; ?>"><i class="<?php echo $level3[$menu3]['icon'];?>"></i><?php echo ucwords($level3[$menu3]['menu_name']); ?></a></li> <!-- SUB MENU LEVEL 2  -->
							
							<?php
																}
															}
														}
							?>
											</ul>
										</li>
							<?php							
												
													}
													elseif($level2[$menu2]['level']==2){
							?>
											<li><a href="<?php echo base_url().$level2[$menu2]['link_menu']; ?>"><i class="<?php echo $level2[$menu2]['icon'];?>"></i><?php echo ucwords($level2[$menu2]['menu_name']); ?></a></li> <!-- SUB MENU LEVEL 2  -->

							<?php
													}
												}
											}
										//}	
						?>
									</ul>
								</li>
						<?php
									}
									else{
										//tidak punya submenu
										if($level1[$menu]['level']==1){
											//menu level 1
						?>
									<li><a href="<?php echo base_url().$level1[$menu]['link_menu']; ?>"><i class="<?php echo $level1[$menu]['icon'];?>"></i><span class="title"> <?php echo ucwords($level1[$menu]['menu_name']); ?></span></a></li> <!-- MENU  -->
								</li>
										
						<?php
										}
										else{
											//menu level 2,3,4 dst
											foreach($level2a as $menu2a => $items2a){
												//$sub_id = $level2[$menu2]['id'];
												$header_id = ($level2a[$menu2a]['header_id'] == null || $level2a[$menu2a]['header_id'] == "") ? "" : $level2a[$menu2a]['header_id'];
												//menu level 2,3,4,dst
												if($header_id==$id){
													
													$is_header = false;
													
													if($level2a[$menu2a]['type']=="header") $is_header = true;
														
													if($is_header == true){
							?>
							
							<?php
													}
													elseif($level2a[$menu2a]['level']==2){
							?>
											<li><a  href="<?php echo base_url().$level2a[$menu2a]['link_menu']; ?>"><i class="<?php echo $level2a[$menu2a]['icon'];?>"></i><?php echo ucwords($level2a[$menu2a]['menu_name']); ?></a></li> <!-- SUB MENU LEVEL 2  -->

							<?php
													}
												}
											}
										}
									}
								}
							
						?>
				<li>
					<a href="<?php echo base_url();?>auth/logout">
					<i class="icon-users"></i>
					<span class="title">Log Out</span>
					</a>
				</li>
			</ul>
		</div>
	</div>
