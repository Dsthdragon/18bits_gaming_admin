</div>
	<div class="container">
		<div class="copy-rights">
			Copyright(c) <?= NAME; ?>.
		</div>
	</div>
	<!-- Bootstrap core JavaScript
	================================================== -->
	<!-- Placed at the end of the document so the pages load faster -->
	<script src="<?php echo URL; ?>public/js/jquery-1.11.3.js"></script>
	<script src="<?php echo URL; ?>public/js/bootstrap.js"></script>
    <script src="<?php echo URL; ?>public/js/default.js" type="text/javascript" ></script>
    <?php if (isset($this->js)) : ?>
        <?php foreach ($this->js as $js) : ?>
            <script type="text/javascript" src="<?= URL ?>views/<?= $js ?>"></script>
        <?php endforeach; ?>
    <?php endif; ?>
</body>
</html>