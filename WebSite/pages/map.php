<script src="https://maps.google.com/maps?file=api&amp;v=2&amp;key=AIzaSyBq-2ujcneg_LW0GB6fAglTCpza1cj5Q1s"></script>
     <script type="text/javascript" src="../js/jquery.min.js"></script>
    <script src="../includes/slmapapi.php"></script>
    <link rel="stylesheet" type="text/css" href="../css/slmapapi.css" />
    <style type="text/css">#map-container {width: 100%; height: 100%;}</style>
    <?php
    if($_GET['xloc'] == "" || !isset($_GET['xloc']))
    {
    $locx = $mapstartX;
    }
    else
    {
    $locx = $_GET['xloc'];
    }
        if($_GET['locy'] == "" || !isset($_GET['locy']))
    {
    $locy = $mapstartY;
    }
    else
    {
    $locy = $_GET['locy'];
    }
    ?>
    <script type="text/javascript">
    function loadmap(){
        var coords = {'x' : <?php  echo $locx; ?> + 0.5, 'y' : <?php echo $locy; ?> + 0.5},
        mapInstance = new SLURL.Map(document.getElementById('map-container'), {'overviewMapControl':true});
        mapInstance.centerAndZoomAtSLCoord(new SLURL.XYPoint(coords.x, coords.y), 3);}
    $(document).ready(loadmap);
    </script>
    <div id = "map-container"></div>