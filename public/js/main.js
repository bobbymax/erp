
var app = new Vue({
	el: '#root',
	data: {
		allowances: JSON.parse(editable.replace(/&quot;/g,'"')),
		aim: '',
		objectives: [],
		isBlock: false,
		isDisabled: true,
		expectations: [],
	},
	methods: {
		currencyFormat(num) {
		   return 'NGN ' + num.toFixed(2).replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,');
		},

		updateDatabase() {

			// alert("i'm here");
			$.ajax({
				url : url,
                data : { 
                    training : training_id,
                    objective : this.aim,
                    _token : token 
                },
                method : 'POST',
                success : function(data) {
                    if ( data.status === 'success' ) {
                        swal("Good Job!", data.data, "success");
                        setInterval(function() {
                        }, 1000);
                    }
                },
                error : function(data) {
                    console.log(data);
                }
			});
		},
		addObjective() {
			// Add Objective to database 
			this.updateDatabase();

			// Update List
			
			this.objectives.push(this.aim);
			this.aim = '';
		},

		remove(index) {
			var newExpectations = this.$delete(this.expectations, index);
		},

		finishWork() {
			this.isBlock = true;
			this.isDisabled = false;
		},

		printInstruction() {
			window.print();
		},
	},

	computed: {

		estacode() {
			return this.expectations;
		},

		totalfee() {
			var ar = this.expectations;
			var total = 0;
			for(i = 0; i < ar.length; i++)
			{
				total += ar[i].value;
			}

			return total;
		},

		numofdays() {
			const date1 = new Date(this.allowances.training.start_date);
			const date2 = new Date(this.allowances.training.end_date);
			const diffTime = Math.abs(date2 - date1);
			const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24)); 
			// console.log(diffDays);
			return diffDays + 2;
		},

		airticket() {
			return this.allowances.grade_group.allowance.local_flight_ticket * 2;
		},

		perdiem() {
			return this.allowances.estacode * this.numofdays;
		},

		airportshuttle() {
			return this.allowances.grade_group.allowance.airport_shuttle * 2;
		},

		intracity() {
			return this.allowances.grade_group.allowance.intra_city_shuttle * (this.numofdays - 1);
		},

		outofpocket() {
			return this.allowances.grade_group.allowance.out_of_pocket * this.numofdays;
		},

		phtransit() {
			return this.allowances.grade_group.allowance.ph_transit * 2;
		}

	},

	created() {
		this.expectations = [
			{
				'name': 'Air Ticket',
				'value': this.airticket
			},
			{
				'name': 'Airport Shuttle',
				'value': this.airportshuttle
			},
			{
				'name': 'Per Diem Allowance',
				'value': this.perdiem
			},
			{
				'name': 'Transport to and fro From PHC',
				'value': this.phtransit
			},
			{
				'name': 'Intra-City Transport',
				'value': this.intracity
			},
			{
				'name': 'Out of Pocket',
				'value': this.outofpocket
			},
		]
	},
});