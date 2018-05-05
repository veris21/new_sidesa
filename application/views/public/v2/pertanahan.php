<div class="map" style="height: 680px;">
          <div class="map-inner">
            <div class="map-object">
              <div id="map-object"></div>
              <div class="map-toolbar">
                <div class="map-toolbar-group">
                  <div id="map-toolbar-action-zoom-in" class="map-toolbar-group-item"><i class="fa fa-plus"></i></div>
                  <!-- /.map-toolbar-group-item -->
                  <div id="map-toolbar-action-zoom-out" class="map-toolbar-group-item"><i class="fa fa-minus"></i></div>
                  <!-- /.map-toolbar-group-item -->
                </div>
                <!-- /.map-toolbar-group -->
                <div class="map-toolbar-group">
                  <div id="map-toolbar-action-current-position" class="map-toolbar-group-item"><i class="fa fa-location-arrow"></i></div>
                  <!-- /.map-toolbar-group-item -->
                  <div id="map-toolbar-action-fullscreen" class="map-toolbar-group-item"><i class="fa fa-arrows-alt"></i></div>
                  <!-- /.map-toolbar-group-item -->
                </div>
                <!-- /.map-toolbar-group -->
                <div class="map-toolbar-group">
                  <div id="map-toolbar-action-roadmap" class="map-toolbar-group-item">Roadmap</div>
                  <!-- /.map-toolbar-group-item -->
                  <div id="map-toolbar-action-satellite" class="map-toolbar-group-item">Satellite</div>
                  <!-- /.map-toolbar-group-item -->
                  <div id="map-toolbar-action-terrain" class="map-toolbar-group-item">Terrain</div>
                  <!-- /.map-toolbar-group-item -->
                </div>
                <!-- /.map-toolbar-group -->
              </div>
              <!-- /.map-toolbar -->
              <div class="map-filter-wrapper">
                <div class="container-fluid">
                  <div class="map-filter">
                    <form id="filter_form">
                      <div class="form-group">
                        <input type="text" class="form-control" name="desa" placeholder="Nama Desa">
                      </div>
                      <!-- /.form-group -->
                      <div class="form-group">
                        <input type="text" class="form-control" name="lokasi" placeholder="Location">
                      </div>
                      <!-- /.form-group -->
                      <div class="form-group">
                        <input type="text" class="form-control" name="status" placeholder="Status Surat">
                      </div>
                      <!-- /.form-group -->
                      <div class="form-group">
                        <input type="text" class="form-control" name="nik" placeholder="NIK/Pemilik Surat">
                      </div>
                      <!-- /.form-group -->
                      <button type="button" onclick="filter_data()" class="btn">Filter Data</button>

                      <a onclick="refresh()" class="btn btn-warning">Reset</a>
                    </form>
                  </div>
                  <!-- /.map-filter -->
                </div>
                <!-- /.container -->
              </div>
              <!-- /.map-filter-wrapper -->
            </div>
            <!-- /#map-object -->
          </div>
          <!-- /.map-inner -->
        </div>
        <!-- /.map -->
