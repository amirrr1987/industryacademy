<?php
$show_latest_notifs_tab   = codebean_option("show_latest_notifs_tab");
$show_statistics_tab      = codebean_option("show_statistics_tab");
$show_custom_tab          = codebean_option("show_custom_tab");
$dash_custom_tab_title    = codebean_option("dash_custom_tab_title")?:"تب سفارشی";
$dash_custom_tab_content  = codebean_option("dash_custom_tab_content")?:"";
$sc_active_dash_tab  = codebean_option("sc_active_dash_tab");

if($sc_active_dash_tab=="notifs"){$tab_cls = array("display: block;","","");$active_tab=array("active","","");}
if($sc_active_dash_tab=="statics" ){$tab_cls = array("","display: block;","");$active_tab=array("","active","");}
if($sc_active_dash_tab=="scCustomTab" ){$tab_cls = array("","","display: block;");$active_tab=array("","","active");}
?>

<div class="tab">
    <?php if($show_latest_notifs_tab==1){?>
    <button class="tablinks <?php echo $active_tab[0];?>" onclick="studi_tab(event, 'notifs')"><?php echo esc_html__( "Latest Notifications", "studiare" ); ?></button>
    <?php }
    if($show_statistics_tab==1){?>
    <button class="tablinks <?php echo $active_tab[1];?>" onclick="studi_tab(event, 'statics')"><?php echo esc_html__( "Website Statistics", "studiare" ); ?></button>
    <?php }
    if($show_custom_tab==1){?>
    <button class="tablinks <?php echo $active_tab[2];?>" onclick="studi_tab(event, 'scCustomTab')"><?php echo $dash_custom_tab_title;?> </button>
     <?php } ?>
</div>


<!-- Tab content -->
 <?php if($show_latest_notifs_tab==1){?>
<div id="notifs" class="tabcontent" style="<?php echo $tab_cls[0];?>">
  <?php 
		    $number_of_notif_to_show =  codebean_option('sc_notif_to_show') ?: "5";
		    echo sc_studi_get_notifications($number_of_notif_to_show); ?>
</div>
<?php }
    if($show_statistics_tab==1){?>
<div id="statics" class="tabcontent" style="<?php echo $tab_cls[1];?>">
 <!-- Resources -->
<script src="https://cdn.amcharts.com/lib/4/core.js"></script>
<script src="https://cdn.amcharts.com/lib/4/charts.js"></script>
<script src="https://cdn.amcharts.com/lib/4/themes/animated.js"></script>

<!-- Chart code -->
<script>
am4core.ready(function() {

// Themes begin
am4core.useTheme(am4themes_animated);
// Themes end

// Create chart instance
var chart = am4core.create("chartdiv", am4charts.PieChart);

// Add data
chart.data = [
  {
    country: "<?php echo __("products","studiare"); ?>",
    litres: <?php echo $total_products;?>
  },
  {
    country: "<?php echo __("posts","studiare"); ?>",
    litres: <?php echo $total_posts;?>
  },
  <?php if( is_plugin_active( 'wp-events-manager/wp-events-manager.php' ) ){ ?>
  {
    country: "<?php echo __("events","studiare"); ?>",
    litres: <?php echo $total_events;?>
  },
 <?php } ?>
  
];

// Add and configure Series
var pieSeries = chart.series.push(new am4charts.PieSeries());
pieSeries.dataFields.value = "litres";
pieSeries.dataFields.category = "country";
pieSeries.slices.template.stroke = am4core.color("#fff");
pieSeries.slices.template.strokeOpacity = 1;

// This creates initial animation
pieSeries.hiddenState.properties.opacity = 1;
pieSeries.hiddenState.properties.endAngle = -90;
pieSeries.hiddenState.properties.startAngle = -90;
pieSeries.labels.template.text = "{value.percent.formatNumber('#.0')}%";
//chart.hiddenState.properties.radius = am4core.percent(0);
//pieSeries.slices.template.tooltipText = "{country} {value}";
pieSeries.slices.template.tooltipText = "";
pieSeries.ticks.template.disabled = true;
pieSeries.alignLabels = false;
pieSeries.labels.template.radius = am4core.percent(-40);
pieSeries.labels.template.fill = am4core.color("white");
chart.legend = new am4charts.Legend();
chart.rtl = true;
chart.legend.itemContainers.template.reverseOrder = true;
chart.legend.labels.template.text = "{country}";
}); // end am4core.ready()
</script>

<!-- HTML -->
<div id="chartdiv"></div>
</div>

<?php }
    if($show_custom_tab==1){?>
    <div id="scCustomTab" class="tabcontent" style="<?php echo $tab_cls[2];?>" > <?php echo do_shortcode($dash_custom_tab_content);?> </div>
<?php } ?>




<!-- Styles -->
<style>
g[aria-labelledby="id-66-title"] { display: none; }
g[aria-label="Chart created using amCharts library"] { display: none; }
#chartdiv {
    direction:ltr;
  width: 100%;
  height: 200px;
}
/* Style the tab */
.tab {
  overflow: hidden;
  display:flex;
  justify-content:center;
}
/* Style the buttons that are used to open the tab content */
.tab button {
    float: none;
    border: none;
    outline: none;
    cursor: pointer;
    transition: 0.3s;
    font-size: 14px;
    /*display: inline-block;*/
    padding: 5px;
    background: transparent;
    color: #bbbbbb;
    margin: 0 5px;
    border-bottom: 1px solid transparent;
}
.tabcontent i {
    display: inline;
}

/* Change background color of buttons on hover */
.tab button:hover {
    color: #9098de;
}

/* Create an active/current tablink class */
.tab button.active {
    background-color: transparent;
    color: #9098de;
    border-bottom: 1px solid;
}

/* Style the tab content */
.tabcontent {
  display: none;
  padding: 6px 12px;
text-align: initial;
}
.tabcontent ul.sc_notifs_holder li {
    border-bottom: 1px dashed gainsboro;
}
</style>





<script>
    function studi_tab(evt, tabName) {
  // Declare all variables
  var i, tabcontent, tablinks;

  // Get all elements with class="tabcontent" and hide them
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }

  // Get all elements with class="tablinks" and remove the class "active"
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }

  // Show the current tab, and add an "active" class to the button that opened the tab
  document.getElementById(tabName).style.display = "block";
  evt.currentTarget.className += " active";
}
</script>