let App = (() => {
	return {
		init: () => {
			const baseUrl = window.location.origin + "/washoes/";
			let arrs = []
			let pemesananData
			const pemesanan = (layanan) => {
				$('#submitPesan').on('click', function () {
					if (!arrs.length || $('#jmlSepatu').val() == 0) {
						alert('Masukkan data sepatu anda')
						return
					}
					let id_user = parseInt($('#namaPesanan').attr('data-id'))
					let nama = $('#namaPesanan').html()
					let alamat = $('#alamatPesanan').html()
					let tanggal = getDateNow()
					let ongkos = parseInt($('#ongkos').val())
					let layanan = sumAllLayanan(arrs)
					let total = layanan + ongkos

					pemesananData = JSON.stringify({
						"id_user": id_user,
						"nama": nama,
						"alamat": alamat,
						"ongkos": ongkos,
						"tanggal": tanggal,
						"pesan": arrs,
						"layananTotal": layanan,
						"total": total
					})

					$.ajax({
						url: baseUrl + "do_pemesanan",
						type: "POST",
						data: { pesanan: pemesananData },
						success: function (data) {
							if (data) {
								// Success
								window.location.href = baseUrl + "confirm/" + id_user
							} else {
								// Failed
								return
							}
						}
					})
				})

				$('#jmlSepatu').on('change', function () {
					let index = $("#jmlSepatu option:selected").val()
					$('.Sepatus div').html('')
					arrs = []
					let render = ''

					if (index == 0) {
						$('.Sepatu div').remove('')
						return
					}

					$.ajax({
						url: baseUrl + "layanan",
						method: "GET",
						success: function ($data) {
							let hasil = JSON.parse($data)
							for (let i = 0; i < index; i++) {
								render += `<div class="sepatu${(i + 1)} gr-order"><label>Sepatu ke-${(i + 1)} : <select class="standardSelect layanan" id="layananSepatu" data-index="${(i + 1)}" tabindex="1"><option data-layanan="${i} value="0">Pilih Layanan</option>`
								for (let j = 0; j < hasil.length; j++) {
									render += `<option value = "${hasil[j].id_layanan}" >${hasil[j].nama}</option > `
								}
								render += `</select ></label><br><small class="detail${(i + 1)} order"></small></div>`
								$('.Sepatus').html(render)
							}
							$(".standardSelect").chosen({
								disable_search_threshold: 10,
								no_results_text: "Maaf, data tidak ditemukan!",
								width: "100%"
							})
							layanan()
						}
					}).done(function () {
						console.log('completed')
					})
				})
			}
			const layanan = () => {
				$('.layanan').on('change', function () {
					var layananIndex = $("option:selected", this).attr('value') - 1
					let dropdownIndex = $(this).attr('data-index').replace('Sepatu', '')
					console.log(`${dropdownIndex}  ${layananIndex}`)

					if (Number.isNaN(layananIndex)) {
						$(`.detail${dropdownIndex}`).html('')
						return
					}

					$.ajax({
						url: baseUrl + "layanan",
						method: "GET",
						success: function ($data) {
							let hasil = JSON.parse($data)
							$(`.detail${dropdownIndex}`).html(`Harga : ${hasil[layananIndex].harga}`)
							$(`.detail${dropdownIndex}`).attr('value', hasil[layananIndex].harga)
							arrs[dropdownIndex - 1] = {
								"id_layanan": parseInt(hasil[layananIndex].id_layanan),
								"nama": hasil[layananIndex].nama,
								"harga": parseInt(hasil[layananIndex].harga)
							}
							console.log(arrs)
						}
					}).done(function () {
						console.log('completed')
					})
				})
			}
			const regis = () => {
				$('#kelurahanSelect').on('change', function () {
					let selected = $("#kelurahanSelect option:selected").val()
					console.log(selected)
					$.ajax({
						url: baseUrl + "kelurahan/" + selected,
						method: "GET",
						success: function ($data) {
							if (selected == 0) {
								$('#kecamatanOption').val('')
								$('#kecamatanOption').html('')
								$('#idKecamatan').val('')
								return;
							}
							// console.log($data)
							let hasil = JSON.parse($data)
							$('#kecamatanOption').html(hasil["0"].NAMA)
							$('#idKecamatan').val(hasil["0"].ID_KECAMATAN)
						}
					})
				})
			}
			const sumAllLayanan = (arrs) => {
				$total = 0;
				for (let i = 0; i < arrs.length; i++) {
					$total += arrs[i].harga
				}
				return $total
			}
			const getDateNow = () => {
				let today = new Date();
				let dd = String(today.getDate()).padStart(2, '0');
				let mm = String(today.getMonth() + 1).padStart(2, '0');
				let yyyy = today.getFullYear();
				return `${yyyy}-${mm}-${dd}`
			}
			const infoSwal = () => {
				let flashData = $('.flash-data').data('flash')
				if (flashData) {
					Swal.fire({
						type: 'success',
						title: 'Pesanan Berhasil',
						text: flashData
					})
				}
			}
			let path = window.location.pathname.split('/')[2]
			let base = window.location.pathname.split('/')[1]

			if (path === "pemesanan") {
				pemesanan(layanan)
			} if (path === "regis") {
				regis()
			} if (base === "washoes") {
				infoSwal()
			}
		}
	}
})()
