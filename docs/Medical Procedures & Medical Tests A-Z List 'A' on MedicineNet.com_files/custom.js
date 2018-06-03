$(function() {

	//Check if Conating Div's are empty if they aren't show them
	if ($('#ContentPane21:empty').is(':empty')) {
		$('#ContentPane21').parents('.sidebar-box').addClass('hide');
	}
	else {
		$('#ContentPane21').parents('.sidebar-box').removeClass('hide');
	}
	
	//Font Sizer
    $('.fontSizer a').click(function () {
	    $('.fontSizer a').removeClass('active'); $(this).addClass('active');
    });
    $('.fontSizer a.smlFont').click(function () {
        $('#textArea').removeClass(); $('#textArea').addClass('copyNormal'); $.cookie("fontSize", "normal");
    });
    $('.fontSizer a.medFont').click(function () {
        $('#textArea').removeClass(); $('#textArea').addClass('copyMedium'); $.cookie("fontSize", "medium");
    });
    $('.fontSizer a.lrgFont').click(function () {
        $('#textArea').removeClass(); $('#textArea').addClass('copyLarge'); $.cookie("fontSize", "large");
    });
    //alert( $.cookie("fontSize") );			
    if ($.cookie('fontSize') == null) {
        $('.fontSizer a').removeClass('active'); $('.fontSizer a.smlFont').addClass('active'); $('#textArea').addClass('copyNormal');
    } else if ($.cookie('fontSize') == 'normal') {
        $('.fontSizer a').removeClass('active'); $('.fontSizer a.smlFont').addClass('active'); $('#textArea').addClass('copyNormal');
    } else if ($.cookie('fontSize') == 'medium') {
        $('.fontSizer a').removeClass('active'); $('.fontSizer a.medFont').addClass('active'); $('#textArea').addClass('copyMedium');
    } else if ($.cookie('fontSize') == 'large') {
        $('.fontSizer a').removeClass('active'); $('.fontSizer a.lrgFont').addClass('active'); $('#textArea').addClass('copyLarge');
    }

	//Article Tables Zebra Strips
	$('.artTable tbody tr:odd').addClass('odd');
	
	//Patient Discussions
	$('.patDiscContent .patDiscQuestWrap:last').addClass('last');
	
	//AIA 
	$(".articleInArticleToggle h5").click(function() {
		var txt = $(this).next(".articleInArticleToggleList").is(':visible') ? '+' : '-';
		$(this).children("span").text(txt);
		$(this).next(".articleInArticleToggleList").toggle();
		$(this).toggleClass("active");
	});
	$(".image li:nth-child(3n)").css('margin-right','0px');
	
	//Article Large Image  	
    var artTitle = $('.articleLrgImg a img').attr('title');
    $('.articleLrgImg a').prepend('<div class="articleImgTitle">' + artTitle + '</div>');    
	$('.articleLrgImg a').append('<div class="articleImgExpand" title="Full-size image">+</div>');
	$('.articleImgTitle, .articleImgExpand').css('opacity','0.70');
	
	//Related Toggle
	$('.ltcToggleTitle').click(function() {
		$(this).closest('.ltcToggle').find('.ltcToggleWrap').slideToggle();
		$(this).closest('.ltcToggle').find('.ltcToggleTitle i').toggleClass('down');
	});

	//QandA Toggle
	$('.docToggleTitle').click(function() {
		$(this).closest('.docToggle').find('.docToggleWrap').slideToggle();
		$(this).closest('.docToggle').find('.docToggleTitle i').toggleClass('down');
	});
	
		//QandA Toggle
	$('.QAToggleTitle').click(function() {
		$(this).closest('.QAToggle').find('.QAToggleWrap').slideToggle();
		$(this).closest('.QAToggle').find('.QAToggleTitle i').toggleClass('down');
	});

        //QandA Toggle
	$('.QAICCTitle a.showcomments, a.hidecomments').click(function() {
		if (!$('.QAICCWrap').is(':visible'))
			wmdTrack('pc-drv-open');
		$(this).closest('.QAICC').find('.QAICCWrap').slideToggle();
		$(this).closest('.QAICC').find('i.arrow').toggleClass('close');
		var a = $(this).closest('.emb_patient');
		$(a).toggleClass('shadow');
		if ($(a).find(".showcomments").text().indexOf('Read') > -1)
			$(a).find('.showcomments').html($(a).find('.showcomments').html().replace("Read", "Hide"));
		else
			$(a).find('.showcomments').html($(a).find('.showcomments').html().replace("Hide", "Read"));
		if ($(a).width() < 300)
		{
			$(a).data('width', $(a).css('width'));
			$(a).css('position', 'absolute').css('width',$(a).data('width'));
			$(a).animate({width:$('.article').width()}, 500);
		}
		else
		{	
			$(a).animate({width:$(a).data('width')}, 500, function() {
				$(a).css('position', 'relative');
			});
			
		}
	});
	
    // articleplayer TOC
    $('#ap-toc h5').click(function () {
        $('#ap-toc ul').toggleClass('active');
	$('#ap-toc h5 i').toggleClass('active');
    });
	//Keep Focus on Scrolling Div
	$('.ltcToggleList, .scrollFocus').bind('mousewheel DOMMouseScroll', function(e) {
	    var scrollTo = null;
	
	    if (e.type == 'mousewheel') {
	        scrollTo = (e.originalEvent.wheelDelta * -1);
	    }
	    else if (e.type == 'DOMMouseScroll') {
	        scrollTo = 40 * e.originalEvent.detail;
	    }
	
	    if (scrollTo) {
	        e.preventDefault();
	        $(this).scrollTop(scrollTo + $(this).scrollTop());
	    }
	});
	

	
});

