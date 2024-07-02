const isIE11 = () => -1 !== navigator.userAgent.indexOf('Trident');

export const setItemsHeight = (items) => {
	[].slice.call(items).forEach((item) => {
		item.style.minHeight = '';

		if (isIE11()) {
			item.style.height = '';
		}
	});

	const sliderHeight = (() => {
		let sliderHeight = 0;
		[].slice.call(items).forEach((item) => {
			const naturalHeight   = item.offsetHeight;
			const recommendHeight = item.offsetWidth * 0.5625;

			if (sliderHeight < naturalHeight || sliderHeight < recommendHeight) {
				if (recommendHeight < naturalHeight) {
					sliderHeight = naturalHeight;
				} else {
					sliderHeight = recommendHeight;
				}
			}
		});

		return sliderHeight;
	})();

	[].slice.call(items).forEach((item) => {
		if (isIE11()) {
			item.style.height = `${sliderHeight}px`;
		}

		item.style.minHeight = `${sliderHeight}px`;
	});
}
