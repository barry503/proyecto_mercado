<?php 
// Activamos el almacenamiento en el buffer
ob_start();
session_start();

if(!isset($_SESSION["usuario"])){

  header("Location: login.php");
}else
{

 ?>
<?php include '../config/fun_section.php'; ?>
<?php $nom_section= nom_section("Inicio "); ?>
<?php require'includes/header.php'; ?>



<!-- STATISTIC -->
<section class="statistic statistic2">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-lg-3">
                <div class="statistic__item statistic__item--green">
                    <h2 class="number">10,368</h2>
                    <span class="desc">members online</span>
                    <div class="icon">
                        <i class="zmdi zmdi-account-o"></i>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="statistic__item statistic__item--orange">
                    <h2 class="number">388,688</h2>
                    <span class="desc">items sold</span>
                    <div class="icon">
                        <i class="zmdi zmdi-shopping-cart"></i>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="statistic__item statistic__item--blue">
                    <h2 class="number">1,086</h2>
                    <span class="desc">this week</span>
                    <div class="icon">
                        <i class="zmdi zmdi-calendar-note"></i>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="statistic__item statistic__item--red">
                    <h2 class="number">$1,060,386</h2>
                    <span class="desc">total earnings</span>
                    <div class="icon">
                        <i class="zmdi zmdi-money"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div>
        
    </div>
</section>
<!-- END STATISTIC -->

<!-- STATIC CHART -->
<section class="statistic-chart">
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h3 class="title-5 m-b-35">statistics</h3>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 col-lg-4">
            <!-- CHART-->
            <div class="statistic-chart-1">
                <h3 class="title-3 m-b-30">chart</h3>
                <div class="chart-wrap"><div style="position: absolute; inset: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;" class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div></div><div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:200%;height:200%;left:0; top:0"></div></div></div>
                    <canvas id="widgetChart5" style="display: block; width: 330px; height: 242px;" class="chartjs-render-monitor" width="330" height="242"></canvas>
                </div>
                <div class="statistic-chart-1-note">
                    <span class="big">10,368</span>
                    <span>/ 16220 items sold</span>
                </div>
            </div>
            <!-- END CHART-->
        </div>
        <div class="col-md-6 col-lg-4">
            <!-- TOP CAMPAIGN-->
            <div class="top-campaign">
                <h3 class="title-3 m-b-30">top campaigns</h3>
                <div class="table-responsive">
                    <table class="table table-top-campaign">
                        <tbody>
                            <tr>
                                <td>1. Australia</td>
                                <td>$70,261.65</td>
                            </tr>
                            <tr>
                                <td>2. United Kingdom</td>
                                <td>$46,399.22</td>
                            </tr>
                            <tr>
                                <td>3. Turkey</td>
                                <td>$35,364.90</td>
                            </tr>
                            <tr>
                                <td>4. Germany</td>
                                <td>$20,366.96</td>
                            </tr>
                            <tr>
                                <td>5. France</td>
                                <td>$10,366.96</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- END TOP CAMPAIGN-->
        </div>
        <div class="col-md-6 col-lg-4">
            <!-- CHART PERCENT-->
            <div class="chart-percent-2">
                <h3 class="title-3 m-b-30">chart by %</h3>
                <div class="chart-wrap"><div style="position: absolute; inset: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;" class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div></div><div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:200%;height:200%;left:0; top:0"></div></div></div>
                    <canvas id="percent-chart2" style="display: block; width: 330px; height: 209px;" class="chartjs-render-monitor" width="330" height="209"></canvas>
                    <div id="chartjs-tooltip">
                        <table></table>
                    </div>
                </div>
                <div class="chart-info">
                    <div class="chart-note">
                        <span class="dot dot--blue"></span>
                        <span>products</span>
                    </div>
                    <div class="chart-note">
                        <span class="dot dot--red"></span>
                        <span>Services</span>
                    </div>
                </div>
            </div>
            <!-- END CHART PERCENT-->
        </div>
    </div>
</div>
</section>
<!-- END STATIC CHART -->
<!-- RECENT REPORT 2              -->
<div class="recent-report2">
                                    <h3 class="title-3">recent reports</h3>
                                    <div class="chart-info">
                                        <div class="chart-info__left">
                                            <div class="chart-note">
                                                <span class="dot dot--blue"></span>
                                                <span>products</span>
                                            </div>
                                            <div class="chart-note">
                                                <span class="dot dot--green"></span>
                                                <span>Services</span>
                                            </div>
                                        </div>
                                        <div class="chart-info-right">
                                            <div class="rs-select2--dark rs-select2--md m-r-10">
                                                <select class="js-select2 select2-hidden-accessible" name="property" tabindex="-1" aria-hidden="true">
                                                    <option selected="selected">All Properties</option>
                                                    <option value="">Products</option>
                                                    <option value="">Services</option>
                                                </select><span class="select2 select2-container select2-container--default" dir="ltr" style="width: 114.017px;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-labelledby="select2-property-hh-container"><span class="select2-selection__rendered" id="select2-property-hh-container" title="All Properties">All Properties</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                                                <div class="dropDownSelect2"></div>
                                            </div>
                                            <div class="rs-select2--dark rs-select2--sm">
                                                <select class="js-select2 au-select-dark select2-hidden-accessible" name="time" tabindex="-1" aria-hidden="true">
                                                    <option selected="selected">All Time</option>
                                                    <option value="">By Month</option>
                                                    <option value="">By Day</option>
                                                </select><span class="select2 select2-container select2-container--default" dir="ltr" style="width: 89.0167px;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-labelledby="select2-time-gt-container"><span class="select2-selection__rendered" id="select2-time-gt-container" title="All Time">All Time</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                                                <div class="dropDownSelect2"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="recent-report__chart"><div style="position: absolute; inset: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;" class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div></div><div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:200%;height:200%;left:0; top:0"></div></div></div>
                                        <canvas id="recent-rep2-chart" style="display: block; width: 544px; height: 230px;" class="chartjs-render-monitor" width="544" height="230"></canvas>
                                    </div>
                                </div>

<!-- END RECENT REPORT 2              -->

<?php require'includes/footer.php'; ?>

<?php
 } 
ob_end_flush();
 ?>