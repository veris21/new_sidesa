$(document).ready(function() {
    'use strict';
    // var base_url = window.location.origin + '/' + window.location.pathname.split ('/') [1] + '/';
    var base_url = 'https://si-desa.id/';
    // var base_url = 'http://localhost/SIA-GTG.github/';
    // console.log(base_url);
    if ($('#map-object').length !== 0) {
        // var mapCenter = new google.maps.LatLng(47.603138, -122.332302);
        var mapCenter = new google.maps.LatLng(-2.858830, 107.906900);
        var map = new google.maps.Map(document.getElementById('map-object'), {
            zoom: 10,
            scrollwheel: false,
            mapTypeControl: false,
            streetViewControl: false,
            zoomControl: false,
            center: mapCenter,
            mapTypeId: google.maps.MapTypeId.ROADMAP,
            styles: [{
                "featureType": "water",
                "elementType": "geometry",
                "stylers": [{"color": "#e9e9e9"}, {"lightness": 17}]
            }, {
                "featureType": "landscape",
                "elementType": "geometry",
                "stylers": [{"color": "#f5f5f5"}, {"lightness": 20}]
            }, {
                "featureType": "road.highway",
                "elementType": "geometry.fill",
                "stylers": [{"color": "#ffffff"}, {"lightness": 17}]
            }, {
                "featureType": "road.highway",
                "elementType": "geometry.stroke",
                "stylers": [{"color": "#ffffff"}, {"lightness": 29}, {"weight": 0.2}]
            }, {
                "featureType": "road.arterial",
                "elementType": "geometry",
                "stylers": [{"color": "#ffffff"}, {"lightness": 18}]
            }, {
                "featureType": "road.local",
                "elementType": "geometry",
                "stylers": [{"color": "#ffffff"}, {"lightness": 16}]
            }, {
                "featureType": "poi",
                "elementType": "geometry",
                "stylers": [{"color": "#f5f5f5"}, {"lightness": 21}]
            }, {
                "featureType": "poi.park",
                "elementType": "geometry",
                "stylers": [{"color": "#dedede"}, {"lightness": 21}]
            }, {
                "elementType": "labels.text.stroke",
                "stylers": [{"visibility": "on"}, {"color": "#ffffff"}, {"lightness": 16}]
            }, {
                "elementType": "labels.text.fill",
                "stylers": [{"saturation": 36}, {"color": "#333333"}, {"lightness": 40}]
            }, {"elementType": "labels.icon", "stylers": [{"visibility": "off"}]}, {
                "featureType": "transit",
                "elementType": "geometry",
                "stylers": [{"color": "#f2f2f2"}, {"lightness": 19}]
            }, {
                "featureType": "administrative",
                "elementType": "geometry.fill",
                "stylers": [{"color": "#fefefe"}, {"lightness": 20}]
            }, {
                "featureType": "administrative",
                "elementType": "geometry.stroke",
                "stylers": [{"color": "#fefefe"}, {"lightness": 17}, {"weight": 1.2}]
            }]
        });

        var url_filter = base_url +'api/titik_tengah/json';

        $('#nik').on('keypress', ()=>{
            var filter_nik = $('[name="nik"]').val();
            url_filter = base_url+ 'titik_berdasar_nik/'+filter_nik;
            console.log(filter_nik);
            console.log(url_filter);
        });

        $.ajax({
            'url':  url_filter,
            'success': function (data) {
                var markers = [];
                var infobox = new InfoBox({
                    content: 'empty',
                    disableAutoPan: false,
                    maxWidth: 0,
                    pixelOffset: new google.maps.Size(-250, -330),
                    zIndex: null,
                    closeBoxURL: "",
                    infoBoxClearance: new google.maps.Size(1, 1),
                    isHidden: false,
                    isOpen: false,
                    pane: "floatPane",
                    enableEventPropagation: false
                });

                infobox.addListener('domready', function () {
                    $('.infobox-close').on('click', function () {
                        infobox.close(map, this);
                        infobox.isOpen = false;
                    });
                });
                $.each(data, function (index, value) {
                    // console.log('Lat ' + value.latitude + ' Lng '+ value.longitude);
                    var markerCenter = new google.maps.LatLng(value.latitude, value.longitude);
                    var verified = '';
                    var area = '';

                    if (value.verified==1) {
                        verified = '<div class="marker-verified"><i class="fa fa-check"></i></div>';
                    }

                    if (value.area && value.area != 'false') {                        
                        area = '<div class="marker-price">' + value.area + '</div>'
                    }
                    // var base_url = ;
                    var markerTemplate = 
                        '<div id="marker-' + parseFloat(value.id) + '" class="marker">' +
                            '<div class="marker-inner">' + 
                                '<span class="marker-image" style="background-image: url('+  base_url + 'assets/uploader/patok/' + value.dokumentasi + ');"></span>' + 
                            '</div>' +
                            verified + 
                            '<div class="marker-price">'+value.nama +'</div>' + 
                        '</div>';

                    var marker = new RichMarker({
                        id: parseFloat(value.id),
                        data: value,
                        flat: true,
                        position: markerCenter,
                        map: map,
                        shadow: 0,
                        content: markerTemplate
                    });
                    markers.push(marker);

                    google.maps.event.addListener(marker, "click", function () {
                        var c = '<div class="infobox"><div class="infobox-close"><i class="fa fa-close"></i></div>' +
                            '<h3 class="infobox-title"><a href="#">' + marker.data.nama + '</a></h3>' +
                            // '<h4 class="infobox-address">No. Nik '+ marker.data.nik +' </h4>' +
                            '<h4 class="infobox-address">===========================</h4>' +
                            '<div class="infobox-content">' +
                            '<div class="infobox-image" style="background-image: url(' + base_url + '/assets/uploader/patok/'+ marker.data.dokumentasi + ');"></div>' +
                            '<div class="infobox-body"><div class="infobox-body-inner"><div class="infobox-price">'+marker.data.area+' m<sup>2</sup></div><div class="infobox-category tag">'+marker.data.status+'</div><p><strong>Lokasi : '+ marker.data.alamat  +'.</strong></p><p>Alamat Pemilik:  '+ marker.data.alamat  +' <br>Dusun '+ marker.data.alamat +'.</p></div>' +
                            '<div class="infobox-more"><a href="'+ base_url +'public/pertanahan/details/'+ marker.data.nik +'/'+ marker.data.id +'">Read More <i class="fa fa-chevron-right"></i></a></div>' +
                            '</div>' +
                            '<div>';

                        if (!infobox.isOpen) {
                            infobox.setContent(c);
                            infobox.open(map, this);
                            infobox.isOpen = true;
                            infobox.markerId = marker.id;
                        } else {
                            if (infobox.markerId == marker.id) {
                                infobox.close(map, this);
                                infobox.isOpen = false;
                            } else {
                                infobox.close(map, this);
                                infobox.isOpen = false;

                                infobox.setContent(c);
                                infobox.open(map, this);
                                infobox.isOpen = true;
                                infobox.markerId = marker.id;
                            }
                        }
                        // console.log(location + '/assets/uploader/patok/'+ marker.data.dokumentasi);
                    });
                });

                var cluster = [
                    {
                        url: base_url+'assets/v2/img/cluster.png',
                        textColor: 'white',
                        height: 36,
                        width: 36
                    }
                ];

                var markerCluster = new MarkerClusterer(map, markers, {styles: cluster});
            }
        });

        $('#map-toolbar-action-zoom-in').on('click', function (e) {
            e.preventDefault();
            var zoom = map.getZoom();
            map.setZoom(zoom + 1);
        });

        $('#map-toolbar-action-zoom-out').on('click', function (e) {
            e.preventDefault();
            var zoom = map.getZoom();
            map.setZoom(zoom - 1);
        });

        $('#map-toolbar-action-roadmap').on('click', function (e) {
            e.preventDefault();
            map.setMapTypeId(google.maps.MapTypeId.ROADMAP);
        });

        $('#map-toolbar-action-terrain').on('click', function (e) {
            e.preventDefault();
            map.setMapTypeId(google.maps.MapTypeId.TERRAIN);
        });

        $('#map-toolbar-action-satellite').on('click', function (e) {
            e.preventDefault();
            map.setMapTypeId(google.maps.MapTypeId.SATELLITE);
        });

        $('#map-toolbar-action-hybrid').on('click', function (e) {
            e.preventDefault();
            map.setMapTypeId(google.maps.MapTypeId.HYBRID);
        });

        $('#map-toolbar-action-fullscreen').on('click', function (e) {
            $(this).closest('.map-wrapper').toggleClass('fullscreen');
            $(this).toggleClass('active');
            $(window).trigger('resize');
        });

        $('#map-toolbar-action-current-position').on('click', function (e) {
            navigator.geolocation.getCurrentPosition(function (position) {
                var initialLocation = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);
                map.setCenter(initialLocation);
            }, function () {

            });
        });
    }
});
