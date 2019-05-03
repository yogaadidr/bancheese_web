 <!-- Footer -->
      <footer class="site-footer">
        <div class="row">
          <div class="col-md-6">
            <p class="text-center text-md-left">Copyright © 2019 <a href="http://thetheme.io/theadmin">Salatiga Solution</a>. All rights reserved.</p>
          </div>

          <div class="col-md-6">
            <!-- <ul class="nav nav-primary nav-dotted nav-dot-separated justify-content-center justify-content-md-end">
              <li class="nav-item">
                <a class="nav-link" href="../help/articles.html">Documentation</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="../help/faq.html">FAQ</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="https://themeforest.net/item/theadmin-responsive-bootstrap-4-admin-dashboard-webapp-template/20475359?license=regular&open_purchase_for_item_id=20475359&purchasable=source&ref=thethemeio">Purchase Now</a>
              </li>
            </ul> -->
          </div>
        </div>
      </footer>
      <!-- END Footer -->

    </main>
    <!-- END Main container -->



    <!-- Global quickview -->
    <div id="qv-global" class="quickview" data-url="<?= base_url() ?>assets/theadmin/assets/data/quickview-global.html">
      <div class="spinner-linear">
        <div class="line"></div>
      </div>
    </div>
    <!-- END Global quickview -->



    <!-- Scripts -->



    <script>
      app.ready(function(){

        // Scoll to the end of chat content
        $('#chat-content').scrollToEnd();



        // Earning chart
        //
        var chartjs2 = new Chart($("#chart-js-2"), {
          type: 'line',
          data: {
            labels: ["2012", "2013", "2014", "2015", "2016", "2017", "2018"],
            datasets: [
              {
                label: "Advertise",
                backgroundColor: "rgba(51,202,185,0.5)",
                borderColor: "rgba(51,202,185,0.5)",
                pointRadius: 0,
                data: [0, 6000, 8000, 5000, 2000, 5000, 7500]
              },
              {
                label: "Hosting",
                backgroundColor: "rgba(243,245,246,0.8)",
                borderColor: "rgba(243,245,246,0.8)",
                pointRadius: 0,
                data: [9000, 5000, 4000, 2000, 8000, 3000, 9000]
              }
            ]
          },
          options: {
            legend: {
              display: false
            },
          }
        });


      });
    </script>

    <script type="text/javascript">
      $('#exampleModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var recipient = button.data('whatever') // Extract info from data-* attributes
        // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
        // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
        var modal = $(this)
        // modal.find('.modal-title').text('New message to ' + recipient)
        modal.find('#id_hapus').val(recipient)
      })

    </script>

  </body>
</html>