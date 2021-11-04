<!-- Bootsrap 5 -->
<script src="<?= base_url('assets'); ?>/vendor/bootstrap-5/js/bootstrap.bundle.min.js"></script>

<!-- AOS -->
<script src="<?= base_url('assets'); ?>/vendor/aos/js/aos.js"></script>

<!-- Swiper JS -->
<script src="<?= base_url('assets'); ?>/vendor/swiper/js/swiper-bundle.min.js"></script>

<!-- Script Pribadi -->
<script src="<?= base_url('assets'); ?>/demo/<?= $template; ?>/js/app.js"></script>
<script>
    // Play & pause Music
    const music = document.getElementById('music');
    const iconMusic = document.getElementById('icon-music');
    iconMusic.onclick = function() {
        if (!music.paused) {
            music.pause();
            iconMusic.src = "<?= base_url('assets'); ?>/demo/audio/mute.svg"
        } else {
            music.play();
            iconMusic.src = "<?= base_url('assets'); ?>/demo/audio/volume.svg"
        }
    }
</script>
<script>
    // Set the date we're counting down to
    var countDownDate = new Date("<?= data_akad($IDDU, 'tanggal'); ?> <?= data_akad($IDDU, 'jam'); ?>").getTime();

    // Update the count down every 1 second
    var x = setInterval(function() {

        // Get today's date and time
        var now = new Date().getTime();

        // Find the distance between now and the count down date
        var distance = countDownDate - now;

        // Time calculations for days, hours, minutes and seconds
        var days = Math.floor(distance / (1000 * 60 * 60 * 24));
        var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((distance % (1000 * 60)) / 1000);

        // Output the result in an element with id="demo"
        document.getElementById("hitung-mundur").innerHTML = '<p>' + days + '<span> Hari </span>' + hours + '<span> Jam </span>' + minutes + '<span> Menit </span>' + seconds + '<span> Detik </span></p>';

        // If the count down is over, write some text 
        if (distance < 0) {
            clearInterval(x);
            document.getElementById("demo").innerHTML = "EXPIRED";
        }
    }, 1000);
</script>
</body>

</html>