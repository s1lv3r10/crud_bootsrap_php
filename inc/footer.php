	<hr>
</main> <!-- /container -->

	<footer class="container">
	<?php $data = new DateTime("now", new DateTimeZone("America/Sao_Paulo"));?>
		<p>&copy;2024 - <?php echo $data->format("Y")?> - Isabelly e Manuella</p>
	</footer>

	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="<?php echo BASEURL; ?>js/jquery-1.11.2.min.js"><\/script>')</script>

    <script src="<?php echo BASEURL; ?>js/jquery-3.7.1.min.js"></script>
    <script src="<?php echo BASEURL; ?>js/awesome/all.min.js"></script>
    <script src="<?php echo BASEURL; ?>js/bootstrap/bootstrap.bundle.min.js"></script>
    <script src="<?php echo BASEURL; ?>js/main.js"></script>
</body>
</html>