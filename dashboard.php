
<?php
                   
                    $queryPeta = mysql_query("select * from tbl_objek");
                    $cekData = mysql_num_rows($queryPeta);
                    if ($cekData != 0) {
                        ?>
                        <script src="http://maps.google.com/maps/api/js?sensor=false" type="text/javascript"></script>
                        <div id="map_canvas" style="height:500px;border:1px solid green">Google Map</div> 
                        <script type="text/javascript">
                            function initialize() {
                                var map_options = {
                                    center: new google.maps.LatLng(-2.401183, 116.543652),
                                    zoom: 5,
                                    mapTypeId: google.maps.MapTypeId.ROADMAP
                                };

                                var google_map = new google.maps.Map(document.getElementById("map_canvas"), map_options);

                                var info_window = new google.maps.InfoWindow({
                                    content: 'loading'
                                });

                                var t = [];
                                var x = [];
                                var y = [];
                                var h = [];
            <?php
            while ($dataPeta = mysql_fetch_array($queryPeta)) {
                echo "
					t.push('$dataPeta[nama]');
					x.push($dataPeta[latitude]);
					y.push($dataPeta[longitude]);
					h.push('<p><strong>$dataPeta[nama]</p>');
					";
            }
            ?>
                    var i = 0;
                    for ( item in t ) {
                        var m = new google.maps.Marker({
                            map:       google_map,
                            animation: google.maps.Animation.DROP,
                            title:     t[i],
                            position:  new google.maps.LatLng(x[i],y[i]),
                            html:      h[i]
                        });

                        google.maps.event.addListener(m, 'click', function() {
                            info_window.setContent(this.html);
                            info_window.open(google_map, this);
                        });
                        i++;
                    }
                }

                initialize();
                        </script>
                        <?php
                    } else {
                        echo 'Data Kosong';
                    }
?>

       