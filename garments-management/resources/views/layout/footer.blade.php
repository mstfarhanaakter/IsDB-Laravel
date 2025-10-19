<footer class="pc-footer">
  <div class="footer-wrapper container-fluid">
    <div class="row">
      <div class="col-sm my-1">
        <p class="text-center text-muted mb-0">
          Crafted with  &hearts;  by <strong>Farhana</strong>.
        </p>
      </div>
      <div class="col-auto my-1">
        <ul class="list-inline footer-link mb-0">
          <li class="list-inline-item"><a href="#!">Home</a></li>
        </ul>
      </div>
    </div>
  </div>
</footer>

<!-- [Page Specific JS] start -->
<script src="../assets/js/plugins/apexcharts.min.js"></script>
<script src="../assets/js/pages/dashboard-default.js"></script>
<!-- [Page Specific JS] end -->
<!-- Required Js -->
<script src="../assets/js/plugins/popper.min.js"></script>
<script src="../assets/js/plugins/simplebar.min.js"></script>
<script src="../assets/js/plugins/bootstrap.min.js"></script>
<script src="../assets/js/fonts/custom-font.js"></script>
<script src="../assets/js/pcoded.js"></script>
<script src="../assets/js/plugins/feather.min.js"></script>





<script>layout_change('light');</script>




<script>change_box_container('false');</script>



<script>layout_rtl_change('false');</script>


<script>preset_change("preset-1");</script>


<script>font_change("Public-Sans");</script>

<script>layout_change('light');</script>




<script>change_box_container('false');</script>



<script>layout_rtl_change('false');</script>


<script>preset_change("preset-1");</script>


<script>font_change("Public-Sans");</script>




<!-- [Page Specific JS] start -->
<!-- datatable Js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="../assets/js/plugins/jquery.dataTables.min.js"></script>
<script src="../assets/js/plugins/dataTables.bootstrap5.min.js"></script>
<script src="../assets/js/plugins/dataTables.autoFill.min.js"></script>
<script src="../assets/js/plugins/autoFill.bootstrap5.min.js"></script>
<script src="../assets/js/plugins/dataTables.keyTable.min.js"></script>
<script src="../assets/js/plugins/keyTable.bootstrap5.min.js"></script>
<script src="../assets/js/plugins/dataTables.select.min.js"></script>
<script>
    // [ Autofill ]
    $('#autofill').DataTable({
        autoFill: true
    });
    // [ KeyTable Integration ]
    $('#key-integration').DataTable({
        keys: true,
        autoFill: true
    });
    // [ Column Selector ]
    $('#confirm-table').DataTable({
        autoFill: {
            alwaysAsk: true
        }
    });

    // [ scroll fill ]
    var safill = $('#scroll-fill').dataTable({
        scrollY: 400,
        scrollCollapse: true,
        paging: false,
        autoFill: true
    });
    $('#colum-select').DataTable({
        columnDefs: [
            {
                orderable: false,
                className: 'select-checkbox',
                targets: 0
            }
        ],
        select: {
            style: 'os',
            selector: 'td:first-child'
        },
        order: [[1, 'asc']],
        autoFill: {
            columns: ':not(:first-child)'
        }
    });
</script>
<!-- [Page Specific JS] end -->



</body>
<!-- [Body] end -->

</html>