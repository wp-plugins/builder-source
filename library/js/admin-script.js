jQuery(document).ready(function($) {

	if($('textarea#bsp_header_content').length > 0) {

		generateSampleOutput();

		$('textarea#bsp_header_content').on('change keyup paste', function() {

			generateSampleOutput();

		});

	}


	function generateSampleOutput() {

		var linenumber = 23;
		var content    = $('textarea#bsp_header_content').val();
		var lines      = content.split('\n');

		var output = ' \
			<div class="line"> \
				<div class="gutter">' + linenumber + '</div> \
				<div class="code-line comment">&lt;-- Builder source v1.0.0 - http://www.prodes.nl/builder-source/</div> \
			</div> \
			<div class="clear"></div>';


		$.each($(lines), function(number, line) {
			linenumber++;

			output += ' \
			<div class="line"> \
			    <div class="gutter">' + linenumber + '</div> \
			    <div class="code-line tabbed">' + line + '</div> \
			</div> \
			<div class="clear"></div>';
		});

		linenumber++;
		output += ' \
			<div class="line"> \
			    <div class="gutter">' + linenumber + '</div> \
			    <div class="code-line comment">--></div> \
			</div>';


		$('.browser-preview').html(output);

	}

});

