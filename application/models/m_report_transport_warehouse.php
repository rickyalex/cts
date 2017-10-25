<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class m_report_transport_warehouse extends Ci_Model{

 function revenue()
 {

  $revenue = $this->db->query("

  select distinct
  ifnull((SELECT sum(revenue) FROM (v_project_transport) WHERE((periode='JANUARI') and (project_name = 'TRANSPORT WAREHOUSE'))),0) AS `Revenue Januari`,
  ifnull((SELECT sum(revenue) FROM (v_project_transport) WHERE((periode='FEBRUARI') and (project_name = 'TRANSPORT WAREHOUSE'))),0) AS `Revenue Februari`,
  ifnull((SELECT sum(revenue) FROM (v_project_transport) WHERE((periode='MARET') and (project_name = 'TRANSPORT WAREHOUSE'))),0) AS `Revenue Maret`,
  ifnull((SELECT sum(revenue) FROM (v_project_transport) WHERE((periode='APRIL') and (project_name = 'TRANSPORT WAREHOUSE'))),0) AS `Revenue April`,
  ifnull((SELECT sum(revenue) FROM (v_project_transport) WHERE((periode='MEI') and (project_name = 'TRANSPORT WAREHOUSE'))),0) AS `Revenue Mei`,
  ifnull((SELECT sum(revenue) FROM (v_project_transport) WHERE((periode='JUNI') and (project_name = 'TRANSPORT WAREHOUSE'))),0) AS `Revenue Juni`,
  ifnull((SELECT sum(revenue) FROM (v_project_transport) WHERE((periode='JULI') and (project_name = 'TRANSPORT WAREHOUSE'))),0) AS `Revenue Juli`,
  ifnull((SELECT sum(revenue) FROM (v_project_transport) WHERE((periode='AGUSTUS') and (project_name = 'TRANSPORT WAREHOUSE'))),0) AS `Revenue Agustus`,
  ifnull((SELECT sum(revenue) FROM (v_project_transport) WHERE((periode='SEPTEMBER') and (project_name = 'TRANSPORT WAREHOUSE'))),0) AS `Revenue September`,
  ifnull((SELECT sum(revenue) FROM (v_project_transport) WHERE((periode='OKTOBER') and (project_name = 'TRANSPORT WAREHOUSE'))),0) AS `Revenue Oktober`,
  ifnull((SELECT sum(revenue) FROM (v_project_transport) WHERE((periode='NOVEMBER') and (project_name = 'TRANSPORT WAREHOUSE'))),0) AS `Revenue November`,
  ifnull((SELECT sum(revenue) FROM (v_project_transport) WHERE((periode='DESEMBER') and (project_name = 'TRANSPORT WAREHOUSE'))),0) AS `Revenue Desember`
  from v_project_transport GROUP BY project_name
  ");

  return $revenue;

 }
 function target()
 {

  $target = $this->db->query("

  select distinct
  ifnull((SELECT sum(target_revenue) FROM (v_project_transport) WHERE((periode='JANUARI') and (project_name = 'TRANSPORT WAREHOUSE'))),0) AS `Target Januari`,
  ifnull((SELECT sum(target_revenue) FROM (v_project_transport) WHERE((periode='FEBRUARI') and (project_name = 'TRANSPORT WAREHOUSE'))),0) AS `Target Februari`,
  ifnull((SELECT sum(target_revenue) FROM (v_project_transport) WHERE((periode='MARET') and (project_name = 'TRANSPORT WAREHOUSE'))),0) AS `Target Maret`,
  ifnull((SELECT sum(target_revenue) FROM (v_project_transport) WHERE((periode='APRIL') and (project_name = 'TRANSPORT WAREHOUSE'))),0) AS `Target April`,
  ifnull((SELECT sum(target_revenue) FROM (v_project_transport) WHERE((periode='MEI') and (project_name = 'TRANSPORT WAREHOUSE'))),0) AS `Target Mei`,
  ifnull((SELECT sum(target_revenue) FROM (v_project_transport) WHERE((periode='JUNI') and (project_name = 'TRANSPORT WAREHOUSE'))),0) AS `Target Juni`,
  ifnull((SELECT sum(target_revenue) FROM (v_project_transport) WHERE((periode='JULI') and (project_name = 'TRANSPORT WAREHOUSE'))),0) AS `Target Juli`,
  ifnull((SELECT sum(target_revenue) FROM (v_project_transport) WHERE((periode='AGUSTUS') and (project_name = 'TRANSPORT WAREHOUSE'))),0) AS `Target Agustus`,
  ifnull((SELECT sum(target_revenue) FROM (v_project_transport) WHERE((periode='SEPTEMBER') and (project_name = 'TRANSPORT WAREHOUSE'))),0) AS `Target September`,
  ifnull((SELECT sum(target_revenue) FROM (v_project_transport) WHERE((periode='OKTOBER') and (project_name = 'TRANSPORT WAREHOUSE'))),0) AS `Target Oktober`,
  ifnull((SELECT sum(target_revenue) FROM (v_project_transport) WHERE((periode='NOVEMBER') and (project_name = 'TRANSPORT WAREHOUSE'))),0) AS `Target November`,
  ifnull((SELECT sum(target_revenue) FROM (v_project_transport) WHERE((periode='DESEMBER') and (project_name = 'TRANSPORT WAREHOUSE'))),0) AS `Target Desember`
  from v_project_transport GROUP BY project_name
  ");

  return $target;

 }
 function ebitda()
 {

  $ebitda = $this->db->query("

  select distinct
  ifnull((SELECT sum(ebitda) FROM (v_project_transport) WHERE((periode='JANUARI') and (project_name = 'TRANSPORT WAREHOUSE'))),0) AS `Ebitda Januari`,
  ifnull((SELECT sum(ebitda) FROM (v_project_transport) WHERE((periode='FEBRUARI') and (project_name = 'TRANSPORT WAREHOUSE'))),0) AS `Ebitda Februari`,
  ifnull((SELECT sum(ebitda) FROM (v_project_transport) WHERE((periode='MARET') and (project_name = 'TRANSPORT WAREHOUSE'))),0) AS `Ebitda Maret`,
  ifnull((SELECT sum(ebitda) FROM (v_project_transport) WHERE((periode='APRIL') and (project_name = 'TRANSPORT WAREHOUSE'))),0) AS `Ebitda April`,
  ifnull((SELECT sum(ebitda) FROM (v_project_transport) WHERE((periode='MEI') and (project_name = 'TRANSPORT WAREHOUSE'))),0) AS `Ebitda Mei`,
  ifnull((SELECT sum(ebitda) FROM (v_project_transport) WHERE((periode='JUNI') and (project_name = 'TRANSPORT WAREHOUSE'))),0) AS `Ebitda Juni`,
  ifnull((SELECT sum(ebitda) FROM (v_project_transport) WHERE((periode='JULI') and (project_name = 'TRANSPORT WAREHOUSE'))),0) AS `Ebitda Juli`,
  ifnull((SELECT sum(ebitda) FROM (v_project_transport) WHERE((periode='AGUSTUS') and (project_name = 'TRANSPORT WAREHOUSE'))),0) AS `Ebitda Agustus`,
  ifnull((SELECT sum(ebitda) FROM (v_project_transport) WHERE((periode='SEPTEMBER') and (project_name = 'TRANSPORT WAREHOUSE'))),0) AS `Ebitda September`,
  ifnull((SELECT sum(ebitda) FROM (v_project_transport) WHERE((periode='OKTOBER') and (project_name = 'TRANSPORT WAREHOUSE'))),0) AS `Ebitda Oktober`,
  ifnull((SELECT sum(ebitda) FROM (v_project_transport) WHERE((periode='NOVEMBER') and (project_name = 'TRANSPORT WAREHOUSE'))),0) AS `Ebitda November`,
  ifnull((SELECT sum(ebitda) FROM (v_project_transport) WHERE((periode='DESEMBER') and (project_name = 'TRANSPORT WAREHOUSE'))),0) AS `Ebitda Desember`
  from v_project_transport GROUP BY project_name
  ");

  return $ebitda;

 }
 function target_ebitda()
 {

  $target_ebitda = $this->db->query("

  select distinct
  ifnull((SELECT sum(target_revenue - target_cost) FROM (v_project_transport) WHERE((periode='JANUARI') and (project_name = 'TRANSPORT WAREHOUSE'))),0) AS `Target Ebitda Januari`,
  ifnull((SELECT sum(target_revenue - target_cost) FROM (v_project_transport) WHERE((periode='FEBRUARI') and (project_name = 'TRANSPORT WAREHOUSE'))),0) AS `Target Ebitda Februari`,
  ifnull((SELECT sum(target_revenue - target_cost) FROM (v_project_transport) WHERE((periode='MARET') and (project_name = 'TRANSPORT WAREHOUSE'))),0) AS `Target Ebitda Maret`,
  ifnull((SELECT sum(target_revenue - target_cost) FROM (v_project_transport) WHERE((periode='APRIL') and (project_name = 'TRANSPORT WAREHOUSE'))),0) AS `Target Ebitda April`,
  ifnull((SELECT sum(target_revenue - target_cost) FROM (v_project_transport) WHERE((periode='MEI') and (project_name = 'TRANSPORT WAREHOUSE'))),0) AS `Target Ebitda Mei`,
  ifnull((SELECT sum(target_revenue - target_cost) FROM (v_project_transport) WHERE((periode='JUNI') and (project_name = 'TRANSPORT WAREHOUSE'))),0) AS `Target Ebitda Juni`,
  ifnull((SELECT sum(target_revenue - target_cost) FROM (v_project_transport) WHERE((periode='JULI') and (project_name = 'TRANSPORT WAREHOUSE'))),0) AS `Target Ebitda Juli`,
  ifnull((SELECT sum(target_revenue - target_cost) FROM (v_project_transport) WHERE((periode='AGUSTUS') and (project_name = 'TRANSPORT WAREHOUSE'))),0) AS `Target Ebitda Agustus`,
  ifnull((SELECT sum(target_revenue - target_cost) FROM (v_project_transport) WHERE((periode='SEPTEMBER') and (project_name = 'TRANSPORT WAREHOUSE'))),0) AS `Target Ebitda September`,
  ifnull((SELECT sum(target_revenue - target_cost) FROM (v_project_transport) WHERE((periode='OKTOBER') and (project_name = 'TRANSPORT WAREHOUSE'))),0) AS `Target Ebitda Oktober`,
  ifnull((SELECT sum(target_revenue - target_cost) FROM (v_project_transport) WHERE((periode='NOVEMBER') and (project_name = 'TRANSPORT WAREHOUSE'))),0) AS `Target Ebitda November`,
  ifnull((SELECT sum(target_revenue - target_cost) FROM (v_project_transport) WHERE((periode='DESEMBER') and (project_name = 'TRANSPORT WAREHOUSE'))),0) AS `Target Ebitda Desember`
  from v_project_transport GROUP BY project_name
  ");

  return $target_ebitda;

 }
 function cost()
 {

  $cost = $this->db->query("

  select distinct
  ifnull((SELECT sum(cost) FROM (v_project_transport) WHERE((periode='JANUARI') and (project_name = 'TRANSPORT WAREHOUSE'))),0) AS `Cost Januari`,
  ifnull((SELECT sum(cost) FROM (v_project_transport) WHERE((periode='FEBRUARI') and (project_name = 'TRANSPORT WAREHOUSE'))),0) AS `Cost Februari`,
  ifnull((SELECT sum(cost) FROM (v_project_transport) WHERE((periode='MARET') and (project_name = 'TRANSPORT WAREHOUSE'))),0) AS `Cost Maret`,
  ifnull((SELECT sum(cost) FROM (v_project_transport) WHERE((periode='APRIL') and (project_name = 'TRANSPORT WAREHOUSE'))),0) AS `Cost April`,
  ifnull((SELECT sum(cost) FROM (v_project_transport) WHERE((periode='MEI') and (project_name = 'TRANSPORT WAREHOUSE'))),0) AS `Cost Mei`,
  ifnull((SELECT sum(cost) FROM (v_project_transport) WHERE((periode='JUNI') and (project_name = 'TRANSPORT WAREHOUSE'))),0) AS `Cost Juni`,
  ifnull((SELECT sum(cost) FROM (v_project_transport) WHERE((periode='JULI') and (project_name = 'TRANSPORT WAREHOUSE'))),0) AS `Cost Juli`,
  ifnull((SELECT sum(cost) FROM (v_project_transport) WHERE((periode='AGUSTUS') and (project_name = 'TRANSPORT WAREHOUSE'))),0) AS `Cost Agustus`,
  ifnull((SELECT sum(cost) FROM (v_project_transport) WHERE((periode='SEPTEMBER') and (project_name = 'TRANSPORT WAREHOUSE'))),0) AS `Cost September`,
  ifnull((SELECT sum(cost) FROM (v_project_transport) WHERE((periode='OKTOBER') and (project_name = 'TRANSPORT WAREHOUSE'))),0) AS `Cost Oktober`,
  ifnull((SELECT sum(cost) FROM (v_project_transport) WHERE((periode='NOVEMBER') and (project_name = 'TRANSPORT WAREHOUSE'))),0) AS `Cost November`,
  ifnull((SELECT sum(cost) FROM (v_project_transport) WHERE((periode='DESEMBER') and (project_name = 'TRANSPORT WAREHOUSE'))),0) AS `Cost Desember`
  from v_project_transport GROUP BY project_name
  ");

  return $cost;

 }
 function target_cost()
 {

  $target_cost = $this->db->query("

  select distinct
  ifnull((SELECT sum(target_cost) FROM (v_project_transport) WHERE((periode='JANUARI') and (project_name = 'TRANSPORT WAREHOUSE'))),0) AS `Target Cost Januari`,
  ifnull((SELECT sum(target_cost) FROM (v_project_transport) WHERE((periode='FEBRUARI') and (project_name = 'TRANSPORT WAREHOUSE'))),0) AS `Target Cost Februari`,
  ifnull((SELECT sum(target_cost) FROM (v_project_transport) WHERE((periode='MARET') and (project_name = 'TRANSPORT WAREHOUSE'))),0) AS `Target Cost Maret`,
  ifnull((SELECT sum(target_cost) FROM (v_project_transport) WHERE((periode='APRIL') and (project_name = 'TRANSPORT WAREHOUSE'))),0) AS `Target Cost April`,
  ifnull((SELECT sum(target_cost) FROM (v_project_transport) WHERE((periode='MEI') and (project_name = 'TRANSPORT WAREHOUSE'))),0) AS `Target Cost Mei`,
  ifnull((SELECT sum(target_cost) FROM (v_project_transport) WHERE((periode='JUNI') and (project_name = 'TRANSPORT WAREHOUSE'))),0) AS `Target Cost Juni`,
  ifnull((SELECT sum(target_cost) FROM (v_project_transport) WHERE((periode='JULI') and (project_name = 'TRANSPORT WAREHOUSE'))),0) AS `Target Cost Juli`,
  ifnull((SELECT sum(target_cost) FROM (v_project_transport) WHERE((periode='AGUSTUS') and (project_name = 'TRANSPORT WAREHOUSE'))),0) AS `Target Cost Agustus`,
  ifnull((SELECT sum(target_cost) FROM (v_project_transport) WHERE((periode='SEPTEMBER') and (project_name = 'TRANSPORT WAREHOUSE'))),0) AS `Target Cost September`,
  ifnull((SELECT sum(target_cost) FROM (v_project_transport) WHERE((periode='OKTOBER') and (project_name = 'TRANSPORT WAREHOUSE'))),0) AS `Target Cost Oktober`,
  ifnull((SELECT sum(target_cost) FROM (v_project_transport) WHERE((periode='NOVEMBER') and (project_name = 'TRANSPORT WAREHOUSE'))),0) AS `Target Cost November`,
  ifnull((SELECT sum(target_cost) FROM (v_project_transport) WHERE((periode='DESEMBER') and (project_name = 'TRANSPORT WAREHOUSE'))),0) AS `Target Cost Desember`
  from v_project_transport GROUP BY project_name
  ");

  return $target_cost;

 }
 function cost_revenue()
 {

  $cost_revenue = $this->db->query("

  select distinct
  ifnull((SELECT sum((cost / revenue)*100) FROM (v_project_transport) WHERE((periode='JANUARI') and (project_name = 'TRANSPORT WAREHOUSE'))),0) AS `Cost/Revenue Januari`,
  ifnull((SELECT sum((cost / revenue)*100) FROM (v_project_transport) WHERE((periode='FEBRUARI') and (project_name = 'TRANSPORT WAREHOUSE'))),0) AS `Cost/Revenue Februari`,
  ifnull((SELECT sum((cost / revenue)*100) FROM (v_project_transport) WHERE((periode='MARET') and (project_name = 'TRANSPORT WAREHOUSE'))),0) AS `Cost/Revenue Maret`,
  ifnull((SELECT sum((cost / revenue)*100) FROM (v_project_transport) WHERE((periode='APRIL') and (project_name = 'TRANSPORT WAREHOUSE'))),0) AS `Cost/Revenue April`,
  ifnull((SELECT sum((cost / revenue)*100) FROM (v_project_transport) WHERE((periode='MEI') and (project_name = 'TRANSPORT WAREHOUSE'))),0) AS `Cost/Revenue Mei`,
  ifnull((SELECT sum((cost / revenue)*100) FROM (v_project_transport) WHERE((periode='JUNI') and (project_name = 'TRANSPORT WAREHOUSE'))),0) AS `Cost/Revenue Juni`,
  ifnull((SELECT sum((cost / revenue)*100) FROM (v_project_transport) WHERE((periode='JULI') and (project_name = 'TRANSPORT WAREHOUSE'))),0) AS ` Cost/Revenue Juli`,
  ifnull((SELECT sum((cost / revenue)*100) FROM (v_project_transport) WHERE((periode='AGUSTUS') and (project_name = 'TRANSPORT WAREHOUSE'))),0) AS `Cost/Revenue Agustus`,
  ifnull((SELECT sum((cost / revenue)*100) FROM (v_project_transport) WHERE((periode='SEPTEMBER') and (project_name = 'TRANSPORT WAREHOUSE'))),0) AS `Cost/Revenue September`,
  ifnull((SELECT sum((cost / revenue)*100) FROM (v_project_transport) WHERE((periode='OKTOBER') and (project_name = 'TRANSPORT WAREHOUSE'))),0) AS `Cost/Revenue Oktober`,
  ifnull((SELECT sum((cost / revenue)*100) FROM (v_project_transport) WHERE((periode='NOVEMBER') and (project_name = 'TRANSPORT WAREHOUSE'))),0) AS `Cost/Revenue November`,
  ifnull((SELECT sum((cost / revenue)*100) FROM (v_project_transport) WHERE((periode='DESEMBER') and (project_name = 'TRANSPORT WAREHOUSE'))),0) AS `Cost/Revenue Desember`
  from v_project_transport GROUP BY project_name
  ");

  return $cost_revenue;

 }
 function target_cost_revenue()
 {

  $target_cost_revenue = $this->db->query("

  select distinct
  ifnull((SELECT sum((target_cost / target_revenue)*100) FROM (v_project_transport) WHERE((periode='JANUARI') and (project_name = 'TRANSPORT WAREHOUSE'))),0) AS `Target Cost/Revenue Januari`,
  ifnull((SELECT sum((target_cost / target_revenue)*100) FROM (v_project_transport) WHERE((periode='FEBRUARI') and (project_name = 'TRANSPORT WAREHOUSE'))),0) AS `Target Cost/Revenue Februari`,
  ifnull((SELECT sum((target_cost / target_revenue)*100) FROM (v_project_transport) WHERE((periode='MARET') and (project_name = 'TRANSPORT WAREHOUSE'))),0) AS `Target Cost/Revenue Maret`,
  ifnull((SELECT sum((target_cost / target_revenue)*100) FROM (v_project_transport) WHERE((periode='APRIL') and (project_name = 'TRANSPORT WAREHOUSE'))),0) AS `Target Cost/Revenue April`,
  ifnull((SELECT sum((target_cost / target_revenue)*100) FROM (v_project_transport) WHERE((periode='MEI') and (project_name = 'TRANSPORT WAREHOUSE'))),0) AS `Target Cost/Revenue Mei`,
  ifnull((SELECT sum((target_cost / target_revenue)*100) FROM (v_project_transport) WHERE((periode='JUNI') and (project_name = 'TRANSPORT WAREHOUSE'))),0) AS `Target Cost/Revenue Juni`,
  ifnull((SELECT sum((target_cost / target_revenue)*100) FROM (v_project_transport) WHERE((periode='JULI') and (project_name = 'TRANSPORT WAREHOUSE'))),0) AS `Target Cost/Revenue Juli`,
  ifnull((SELECT sum((target_cost / target_revenue)*100) FROM (v_project_transport) WHERE((periode='AGUSTUS') and (project_name = 'TRANSPORT WAREHOUSE'))),0) AS `Target Cost/Revenue Agustus`,
  ifnull((SELECT sum((target_cost / target_revenue)*100) FROM (v_project_transport) WHERE((periode='SEPTEMBER') and (project_name = 'TRANSPORT WAREHOUSE'))),0) AS `Target Cost/Revenue September`,
  ifnull((SELECT sum((target_cost / target_revenue)*100) FROM (v_project_transport) WHERE((periode='OKTOBER') and (project_name = 'TRANSPORT WAREHOUSE'))),0) AS `Target Cost/Revenue Oktober`,
  ifnull((SELECT sum((target_cost / target_revenue)*100) FROM (v_project_transport) WHERE((periode='NOVEMBER') and (project_name = 'TRANSPORT WAREHOUSE'))),0) AS `Target Cost/Revenue November`,
  ifnull((SELECT sum((target_cost / target_revenue)*100) FROM (v_project_transport) WHERE((periode='DESEMBER') and (project_name = 'TRANSPORT WAREHOUSE'))),0) AS `Target Cost/Revenue Desember`
  from v_project_transport GROUP BY project_name
  ");

  return $target_cost_revenue;

 }
}
