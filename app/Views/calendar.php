<?= $this->extend('template'); ?>
<?= $this->section('content'); ?>
<div class="row">
    <div class="col-12">
        <div class="card shadow rounded">
            <div class="card-header">
                <h4>Calendar</h4>
            </div>
            <div class="card-body">
                <div class="fc-overflow">
                    <div id="eventku"></div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $("#eventku").fullCalendar({
            header: {
                left: 'prev,next',
                center: 'title',
                right: 'month, listWeek,'
            },
            events: [
                <?php foreach ($kegiatan as $k) : ?> {
                        title: '<?= $k->agenda ?>',
                        start: '<?= $k->tanggal ?>',
                        color: '<?= fullCalendarCustomColor($k->status, $k->tanggal) ?>',
                        textColor: "#fff"
                    },
                <?php endforeach ?>
            ]
        });
    });
</script>
<?= $this->endSection(); ?>