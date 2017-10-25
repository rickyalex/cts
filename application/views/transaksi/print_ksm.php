<html>
    <head>
    <title>KSM : <?php echo $order_planning['no_do']?></title>
        <style type="text/css"> 
        body {     
            font-family: Verdana;
            font-size: 12;
        }
        div.ksm {
			border:1px solid #ccc;
        padding:10px;
        height:200pt;
        width:180pt;
        }
        div.kiri {
            float:left;
            width:80pt;
            height:150pt;
        }
        div.kiri1 {
            float:left;
            width:80pt;
        }
        div.kanan {
            float:right;
            width:100pt;
        }
        div.clear-fix {
            clear:both;
            float:none;
        }

        </style>
    </head>
 
    <body>
		<div class="ksm">
			<div align="center">
			---------------------------------------------------
			<br />
			<b align="center">Bukti UJO</b>
			<br />
			---------------------------------------------------
			</div>
			<div class="kiri">
             No DO
            <br />
            Date
            <br />
            City Destination
            <br />
            Plant
            <br />
            Driver 1
            <br />
            Driver 2
            <br />
            NoPol
            <br />
            Tonnage
            <br />
            <br />
            U J O
			</div>
     
			<div class="kanan">
            : <b><?php echo $order_planning['no_do']?></b>
            <br />
            : <?php echo $order_planning['execution_date']?>
            <br />
            : <?php echo $order_planning['city']?>
            <br />
            : <?php echo $order_planning['plant']?>
            <br />
            : <?php echo $order_planning['driver']?>
            <br />
            : <?php echo $order_planning['driver']?>
            <br />
            : <?php echo $order_planning['nopol']?>
            <br />
            : <?php echo $order_planning['tonnage']?>
            <br />
            <br />
            : <?php echo $order_planning['ujo']?>
			</div>
			<div class="clear-fix">
				<div class="kiri1">
            KASIR
				</div>
				<div class="kanan">
            <?php echo $order_planning['driver']?>
				</div>
			</div>
		</div>
    </body>
</html>
