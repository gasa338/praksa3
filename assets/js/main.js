jQuery(window).load(function () {
	$(".sertifikati-carousel").owlCarousel({
		loop: true,
		margin: 10,
		nav: false,
		responsive: {
			0: {
				items: 1,
			},
		},
	});
});

$(document).ready(function () {
	/*navigation*/
	$(".rmm-toggled").click(function (e) {
		console.log(counter);
		if ($(this).hasClass("toggled-active")) {
			$(this).removeClass("toggled-active");
			$(".rmm ul").css("display", "none");
			$(".rmm").removeClass("style");
			$("header").removeClass("mobile-header");
			$("body").removeClass("no-scroll");
			$(".mob-nav").addClass("d-none").removeClass("d-block");
			$(".back-nav").removeClass("d-block");
		} else {
			$(this).addClass("toggled-active");
			$(".rmm ul.top-nav").css("display", "flex");
			$(".rmm").addClass("style");
			$("header").addClass("mobile-header");
			$("body").addClass("no-scroll");
			$(".mob-nav").addClass("d-block");

			if (counter > 0) {
				$(".back-nav").addClass("d-block");
			}
		}
	});
	var counter = 0;
	$(".navigation-list").each(function (i) {
		$(this).addClass("navigation-list-" + i);
		$(this).clone().appendTo(".mob-nav");
	});
	$(".mob-nav .navigation-list-0").find(".navigation-list").remove();
	$(".mob-nav .navigation-list-1").find(".navigation-list").remove();
	$(".mob-nav .navigation-list-2").find(".navigation-list").remove();

	$(".mob-nav .navigation-list-0 .mob-dropdown").on("click", function () {
		$(".navigation-list-0").addClass("d-none").removeClass("d-flex");
		$(".navigation-list-1").addClass("d-block").removeClass("d-none");
		$(".back-nav").addClass("d-block");
		counter++;
	});
	$(".mob-nav .navigation-list-1 .mob-dropdown").on("click", function () {
		$(".navigation-list-1").addClass("d-none").removeClass("d-block");
		$(".navigation-list-2").addClass("d-block").removeClass("d-none");
		counter++;
	});
	$(".back-nav").on("click", function () {
		counter--;
		if (counter == 0) {
			$(".back-nav").removeClass("d-block").addClass("d-none");
			$(".navigation-list-1, .navigation-list-2")
				.addClass("d-none")
				.removeClass("d-block");
			$(".navigation-list-0").addClass("d-flex").removeClass("d-none");
		} else if (counter == 1) {
			$(".navigation-list-0, .navigation-list-2")
				.addClass("d-none")
				.removeClass("d-block");
			$(".navigation-list-1").addClass("d-block").removeClass("d-none");
		}
	});

	//hide all tabs first
	$(".tab-content").hide();
	//show the first tab content
	/**/
	$("#tab-1").show();
	if (window.outerWidth < 991) {
		/*$('#tab-1').show();
}
else{*/
		$(".custom-select").addClass("open");
	}

	$(".tabs-item").eq(0).addClass("tabs-active");

	$("#select-box").change(function () {
		dropdown = $("#select-box").val();
		//first hide all tabs again when a new option is selected
		$(".tab-content").hide();
		//then show the tab content of whatever option value was selected
		$("#" + "tab-" + dropdown).show();
	});

	$(".tabs-item").click(function () {
		dropdown = $(this).attr("data-value");
		$(".tabs-item").removeClass("tabs-active");
		$(this).addClass("tabs-active");
		//first hide all tabs again when a new option is selected

		$(".tab-content").hide();
		//then show the tab content of whatever option value was selected
		$("#" + "tab-" + dropdown).show();
	});

	$(".custom-option").click(function () {
		dropdown = $(this).attr("data-value");
		/*$('.tabs-item').removeClass('tabs-active');
	$(this).addClass('tabs-active');*/
		//first hide all tabs again when a new option is selected

		$(".tab-content").hide();
		//then show the tab content of whatever option value was selected
		$("#" + "tab-" + dropdown).show();
	});

	if (document.querySelector(".custom-select-wrapper")) {
		document
			.querySelector(".custom-select-wrapper")
			.addEventListener("click", function () {
				this.querySelector(".custom-select").classList.toggle("open");
			});

		for (const option of document.querySelectorAll(".custom-option")) {
			if (!option.classList.contains("selected")) {
				option.classList.add("select-active");
			}

			option.addEventListener("click", function () {
				for (const option1 of document.querySelectorAll(
					".custom-option"
				)) {
					option1.classList.add("select-active");
				}

				this.classList.remove("select-active");

				if (!this.classList.contains("selected")) {
					this.parentNode
						.querySelector(".custom-option.selected")
						.classList.remove("selected");
					this.classList.add("selected");
					this.closest(".custom-select").querySelector(
						".custom-select__trigger span"
					).textContent = this.textContent;
				}
			});
		}

		window.addEventListener("click", function (e) {
			const select = document.querySelector(".custom-select");
			if (!select.contains(e.target)) {
				select.classList.remove("open");
			}
		});
	}

	//animate text opacity
	var targets = document.querySelectorAll(".trigger");
	targets.forEach((target) => {
		const tl = gsap
			.timeline({
				scrollTrigger: {
					trigger: target,
					start: "center 85%",
					end: "center 60%",
				},
			})
			.fromTo(target, { opacity: 0 }, { opacity: 1 });
	});

	/*-- triger for box --*/
	$(".trigger-box").each(function () {
		var $this = $(this);
		var tl = gsap.timeline();
		var $this = $this.find(".box-fade");
		var length = $this.length;
		for (i = 0; i < length; i++) {
			tl.fromTo(
				$this[i],
				0.4,
				{
					opacity: 0,
					scale: 0.95,
					ease: "circ.in",
				},
				{
					opacity: 1,
					scale: 1,
					ease: "circ.out",
				},
				"-=0.2"
			);
		}
		ScrollTrigger.create({
			trigger: $this,
			animation: tl,
			// markers: true,
			start: "top 70%",
			end: "top 71%",
		});
	});
});
