<template>
	<footer>
		<div class="environment">
			<p>Vue.js 3 + CodeIgniter 4 Integration</p>
			<p>Created by: <strong>Fadhillah Ramadham</strong></p>
			<p>Environment: {{ environment }}</p>
		</div>

		<div class="copyrights">
			<p>
				&copy; {{ currentYear }} CodeIgniter Foundation & Vue.js Team.
				Open source projects released under MIT licenses.
			</p>
		</div>
	</footer>
</template>

<script>
import { computed } from 'vue';

export default {
	name: 'Footer',
	setup() {
		const currentYear = computed(() => new Date().getFullYear());
		const environment = process.env.NODE_ENV || 'development';

		return {
			currentYear,
			environment,
		};
	},
};
</script>

<style scoped>
footer {
	background-color: rgba(221, 72, 20, 0.8);
	text-align: center;
}

footer .environment {
	color: rgba(255, 255, 255, 1);
	padding: 2rem 1.75rem;
}

footer .copyrights {
	background-color: rgba(62, 62, 62, 1);
	color: rgba(200, 200, 200, 1);
	padding: 0.25rem 1.75rem;
}
</style>
