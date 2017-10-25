<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class m_dashboard_2016 extends Ci_Model{
  
 function revenue()
 {
   //$revenue = null;
   $revenue = $this->db->query("
   SELECT 
   IFNULL((SELECT revenue FROM (v_project_summary) WHERE((group_project_name='TRANSPORT')) AND v_project_summary.`year` = '2016'),0) AS `TRANSPORT`, 
   IFNULL((SELECT revenue FROM (v_project_summary) WHERE((group_project_name='WAREHOUSE'))  AND v_project_summary.`year` = '2016'),0) AS `WAREHOUSE`, 
   IFNULL((SELECT revenue FROM (v_project_summary) WHERE((group_project_name='PACKAGING'))  AND v_project_summary.`year` = '2016'),0) AS `PACKAGING`, 
   IFNULL((SELECT revenue FROM (v_project_summary) WHERE((group_project_name='FREIGHT FORWARDING'))  AND v_project_summary.`year` = '2016'),0) AS `FREIGHT FORWARDING` 
   FROM v_project_summary  WHERE v_project_summary.`year` = '2016' GROUP BY YEAR");
  /*$revenue = $this->db->query("
  select   
  ifnull((SELECT revenue FROM (v_project_summary) WHERE((group_project_name='TRANSPORT'))),0) AS `TRANSPORT`,  
  ifnull((SELECT revenue FROM (v_project_summary) WHERE((group_project_name='WAREHOUSE'))),0) AS `WAREHOUSE`,  
  ifnull((SELECT revenue FROM (v_project_summary) WHERE((group_project_name='PACKAGING'))),0) AS `PACKAGING`,  
  ifnull((SELECT revenue FROM (v_project_summary) WHERE((group_project_name='FREIGHT FORWARDING'))),0) AS `FREIGHT FORWARDING`  
  from v_project_summary GROUP BY year
  ");*/
   
  return $revenue;
   
 }
 function bisnis_rev()
 {

  $bisnis_rev = $this->db->query("

  select distinct
  ifnull((SELECT sum(revenue) FROM (v_project_summary1) WHERE((periode='JANUARI') AND (year ='2016'))),0) AS `Revenue Januari`,
  ifnull((SELECT sum(revenue) FROM (v_project_summary1) WHERE((periode='FEBRUARI') AND (year ='2016'))),0) AS `Revenue Februari`,
  ifnull((SELECT sum(revenue) FROM (v_project_summary1) WHERE((periode='MARET') AND (year ='2016'))),0) AS `Revenue Maret`,
  ifnull((SELECT sum(revenue) FROM (v_project_summary1) WHERE((periode='APRIL') AND (year ='2016'))),0) AS `Revenue April`,
  ifnull((SELECT sum(revenue) FROM (v_project_summary1) WHERE((periode='MEI') AND (year ='2016'))),0) AS `Revenue Mei`,
  ifnull((SELECT sum(revenue) FROM (v_project_summary1) WHERE((periode='JUNI') AND (year ='2016'))),0) AS `Revenue Juni`,
  ifnull((SELECT sum(revenue) FROM (v_project_summary1) WHERE((periode='JULI') AND (year ='2016'))),0) AS `Revenue Juli`,
  ifnull((SELECT sum(revenue) FROM (v_project_summary1) WHERE((periode='AGUSTUS') AND (year ='2016'))),0) AS `Revenue Agustus`,
  ifnull((SELECT sum(revenue) FROM (v_project_summary1) WHERE((periode='SEPTEMBER') AND (year ='2016'))),0) AS `Revenue September`,
  ifnull((SELECT sum(revenue) FROM (v_project_summary1) WHERE((periode='OKTOBER') AND (year ='2016'))),0) AS `Revenue Oktober`,
  ifnull((SELECT sum(revenue) FROM (v_project_summary1) WHERE((periode='NOVEMBER') AND (year ='2016'))),0) AS `Revenue November`,
  ifnull((SELECT sum(revenue) FROM (v_project_summary1) WHERE((periode='DESEMBER') AND (year ='2016'))),0) AS `Revenue Desember`
  from v_project_summary1 GROUP BY group_project_name
  ");

  return $bisnis_rev;

 }
 function bisnis_cost()
 {

  $bisnis_cost = $this->db->query("

  select distinct
  ifnull((SELECT sum(cost) FROM (v_project_summary1) WHERE((periode='JANUARI') AND (year ='2016'))),0) AS `Cost Januari`,
  ifnull((SELECT sum(cost) FROM (v_project_summary1) WHERE((periode='FEBRUARI') AND (year ='2016'))),0) AS `Cost Februari`,
  ifnull((SELECT sum(cost) FROM (v_project_summary1) WHERE((periode='MARET') AND (year ='2016'))),0) AS `Cost Maret`,
  ifnull((SELECT sum(cost) FROM (v_project_summary1) WHERE((periode='APRIL') AND (year ='2016'))),0) AS `Cost April`,
  ifnull((SELECT sum(cost) FROM (v_project_summary1) WHERE((periode='MEI') AND (year ='2016'))),0) AS `Cost Mei`,
  ifnull((SELECT sum(cost) FROM (v_project_summary1) WHERE((periode='JUNI') AND (year ='2016'))),0) AS `Cost Juni`,
  ifnull((SELECT sum(cost) FROM (v_project_summary1) WHERE((periode='JULI') AND (year ='2016'))),0) AS `Cost Juli`,
  ifnull((SELECT sum(cost) FROM (v_project_summary1) WHERE((periode='AGUSTUS') AND (year ='2016'))),0) AS `Cost Agustus`,
  ifnull((SELECT sum(cost) FROM (v_project_summary1) WHERE((periode='SEPTEMBER') AND (year ='2016'))),0) AS `Cost September`,
  ifnull((SELECT sum(cost) FROM (v_project_summary1) WHERE((periode='OKTOBER') AND (year ='2016'))),0) AS `Cost Oktober`,
  ifnull((SELECT sum(cost) FROM (v_project_summary1) WHERE((periode='NOVEMBER') AND (year ='2016'))),0) AS `Cost November`,
  ifnull((SELECT sum(cost) FROM (v_project_summary1) WHERE((periode='DESEMBER') AND (year ='2016'))),0) AS `Cost Desember`
  from v_project_summary1 GROUP BY group_project_name
  ");

  return $bisnis_cost;

 }
 function bisnis_target_rev()
 {

  $bisnis_target_rev = $this->db->query("

  select distinct
  ifnull((SELECT sum(target_revenue) FROM (v_project_summary1) WHERE((periode='JANUARI') AND (year ='2016'))),0) AS `Target Revenue Januari`,
  ifnull((SELECT sum(target_revenue) FROM (v_project_summary1) WHERE((periode='FEBRUARI') AND (year ='2016'))),0) AS `Target Revenue Februari`,
  ifnull((SELECT sum(target_revenue) FROM (v_project_summary1) WHERE((periode='MARET') AND (year ='2016'))),0) AS `Target Revenue Maret`,
  ifnull((SELECT sum(target_revenue) FROM (v_project_summary1) WHERE((periode='APRIL') AND (year ='2016'))),0) AS `Target Revenue April`,
  ifnull((SELECT sum(target_revenue) FROM (v_project_summary1) WHERE((periode='MEI') AND (year ='2016'))),0) AS `Target Revenue Mei`,
  ifnull((SELECT sum(target_revenue) FROM (v_project_summary1) WHERE((periode='JUNI') AND (year ='2016'))),0) AS `Target Revenue Juni`,
  ifnull((SELECT sum(target_revenue) FROM (v_project_summary1) WHERE((periode='JULI') AND (year ='2016'))),0) AS `Target Revenue Juli`,
  ifnull((SELECT sum(target_revenue) FROM (v_project_summary1) WHERE((periode='AGUSTUS') AND (year ='2016'))),0) AS `Target Revenue Agustus`,
  ifnull((SELECT sum(target_revenue) FROM (v_project_summary1) WHERE((periode='SEPTEMBER') AND (year ='2016'))),0) AS `Target Revenue September`,
  ifnull((SELECT sum(target_revenue) FROM (v_project_summary1) WHERE((periode='OKTOBER') AND (year ='2016'))),0) AS `Target Revenue Oktober`,
  ifnull((SELECT sum(target_revenue) FROM (v_project_summary1) WHERE((periode='NOVEMBER') AND (year ='2016'))),0) AS `Target Revenue November`,
  ifnull((SELECT sum(target_revenue) FROM (v_project_summary1) WHERE((periode='DESEMBER') AND (year ='2016'))),0) AS `Target Revenue Desember`
  from v_project_summary1 GROUP BY group_project_name
  ");

  return $bisnis_target_rev;

 }
 function bisnis_target_cost()
 {

  $bisnis_target_cost = $this->db->query("

  select distinct
  ifnull((SELECT sum(target_cost) FROM (v_project_summary1) WHERE((periode='JANUARI') AND (year ='2016'))),0) AS `Target Cost Januari`,
  ifnull((SELECT sum(target_cost) FROM (v_project_summary1) WHERE((periode='FEBRUARI') AND (year ='2016'))),0) AS `Target Cost Februari`,
  ifnull((SELECT sum(target_cost) FROM (v_project_summary1) WHERE((periode='MARET') AND (year ='2016'))),0) AS `Target Cost Maret`,
  ifnull((SELECT sum(target_cost) FROM (v_project_summary1) WHERE((periode='APRIL') AND (year ='2016'))),0) AS `Target Cost April`,
  ifnull((SELECT sum(target_cost) FROM (v_project_summary1) WHERE((periode='MEI') AND (year ='2016'))),0) AS `Target Cost Mei`,
  ifnull((SELECT sum(target_cost) FROM (v_project_summary1) WHERE((periode='JUNI') AND (year ='2016'))),0) AS `Target Cost Juni`,
  ifnull((SELECT sum(target_cost) FROM (v_project_summary1) WHERE((periode='JULI') AND (year ='2016'))),0) AS `Target Cost Juli`,
  ifnull((SELECT sum(target_cost) FROM (v_project_summary1) WHERE((periode='AGUSTUS') AND (year ='2016'))),0) AS `Target Cost Agustus`,
  ifnull((SELECT sum(target_cost) FROM (v_project_summary1) WHERE((periode='SEPTEMBER') AND (year ='2016'))),0) AS `Target Cost September`,
  ifnull((SELECT sum(target_cost) FROM (v_project_summary1) WHERE((periode='OKTOBER') AND (year ='2016'))),0) AS `Target Cost Oktober`,
  ifnull((SELECT sum(target_cost) FROM (v_project_summary1) WHERE((periode='NOVEMBER') AND (year ='2016'))),0) AS `Target Cost November`,
  ifnull((SELECT sum(target_cost) FROM (v_project_summary1) WHERE((periode='DESEMBER') AND (year ='2016'))),0) AS `Target Cost Desember`
  from v_project_summary1 GROUP BY group_project_name
  ");

  return $bisnis_target_cost;

 }
 function bisnis_total()
 {

  $bisnis_total = $this->db->query("

  select distinct
  ifnull((SELECT sum(revenue) FROM (v_project_summary1) WHERE ((year ='2016'))),0) AS `Total Revenue`,
  ifnull((SELECT sum(cost) FROM (v_project_summary) WHERE ((year ='2016'))),0) AS `Total Cost`,
  ifnull((SELECT sum(revenue-cost) FROM (v_project_summary) WHERE ((year ='2016'))),0) AS `Total Margin`
  from v_project_summary GROUP BY year
  ");

  return $bisnis_total;

 }
 function bisnis_total_target()
 {

  $bisnis_total_target = $this->db->query("

  select distinct
  ifnull((SELECT sum(target_revenue) FROM (v_project_summary) WHERE ((year ='2016'))),0) AS `Target Total Revenue`,
  ifnull((SELECT sum(target_cost) FROM (v_project_summary) WHERE ((year ='2016'))),0) AS `Target Total Cost`,
  ifnull((SELECT sum(target_revenue-target_cost) FROM (v_project_summary) WHERE ((year ='2016'))),0) AS `Target Total Margin`
  from v_project_summary GROUP BY year
  ");

  return $bisnis_total_target;

 }
}
