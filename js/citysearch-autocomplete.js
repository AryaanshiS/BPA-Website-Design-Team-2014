// Initalize jQuery after document is ready
jQuery(document).ready(
	// When document is ready, do this function
	function()
	{
		// Autocomplete search results from tags with citysearch ID
		$('#citysearch').autocomplete(
			{
				// Use this as the source for autocompletion
				source:'php/suggest_city.php',
				// Do not autocomplete unless there are at least 2 charactors present
				minLength:2
			});
	});