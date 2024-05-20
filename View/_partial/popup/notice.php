<?php include './View/_partial/popup/modal_modules.php';
// popupModules::onlyWindows("Chú ý", "<div id=\"notice\">test</div>", "noticePopup") 
?>

<div class="modal fade" id="noticePopup" tabindex="-1" aria-labelledby="popupLabel" aria-hidden="true" style="z-index:9999">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="popupLabel">Chú ý</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                    <div id="notice">test</div>
                    </div>
                </div>
            </div>
        </div>
<script>
    function showNotice(title) {
        document.getElementById("notice").innerHTML = title;
        $('#noticePopup').modal('show');
    }
</script>