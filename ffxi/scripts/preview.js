jQuery(document).ready(function($){
	if ( !$("#showpro").is(":checked") )
		$("#showprotbl").hide();

	$("#showpro").change(function(){
		if ( $("#showpro").is(":checked") )
			$("#showprotbl").fadeIn("fast");
		else
			$("#showprotbl").fadeOut("fast");
	});

	if ( !$("#showbjob").is(":checked") )
		$("#showbjobtbl").hide();

	$("#showbjob").change(function(){
		if ( $("#showbjob").is(":checked") )
			$("#showbjobtbl").fadeIn("fast");
		else
			$("#showbjobtbl").fadeOut("fast");
	});

	if ( !$("#showajob").is(":checked") )
		$("#showajobtbl").hide();

	$("#showajob").change(function(){
		if ( $("#showajob").is(":checked") )
			$("#showajobtbl").fadeIn("fast");
		else
			$("#showajobtbl").fadeOut("fast");
	});

	if ( !$("#showcraft").is(":checked") )
		$("#showcrafttbl").hide();

	$("#showcraft").change(function(){
		if ( $("#showcraft").is(":checked") )
			$("#showcrafttbl").fadeIn("fast");
		else
			$("#showcrafttbl").fadeOut("fast");
	});

	if ( !$("#showws").is(":checked") )
		$("#showwstbl").hide();

	$("#showws").change(function(){
		if ( $("#showws").is(":checked") )
			$("#showwstbl").fadeIn("fast");
		else
			$("#showwstbl").fadeOut("fast");
	});

	if ( !$("#showcom").is(":checked") )
		$("#showcomtbl").hide();

	$("#showcom").change(function(){
		if ( $("#showcom").is(":checked") )
			$("#showcomtbl").fadeIn("fast");
		else
			$("#showcomtbl").fadeOut("fast");
	});

	if ( !$("#showmag").is(":checked") )
		$("#showmagtbl").hide();

	$("#showmag").change(function(){
		if ( $("#showmag").is(":checked") )
			$("#showmagtbl").fadeIn("fast");
		else
			$("#showmagtbl").fadeOut("fast");
	});

	if ( !$("#showmis").is(":checked") )
		$("#showmistbl").hide();

	$("#showmis").change(function(){
		if ( $("#showmis").is(":checked") )
			$("#showmistbl").fadeIn("fast");
		else
			$("#showmistbl").fadeOut("fast");
	});

});