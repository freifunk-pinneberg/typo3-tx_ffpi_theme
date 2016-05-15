## -------- Donation Overlay --------
lib.donation = COA
lib.donation {
	10 = TEXT
	10.value (
	<div class="donation-overlay">
	)
	
	20 = TEXT
	20.value = {$ffpi.donation.label}
	20.typolink.parameter = {$ffpi.donation.pid}
	20.typolink.ATagParams = class="button"
	
	30 = TEXT
	30.value = </div>
}