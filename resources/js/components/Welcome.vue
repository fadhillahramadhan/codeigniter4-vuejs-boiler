<template>
	<div>
		<h1>About this page</h1>

		<p>
			This page is being generated by <strong>Vue.js 3</strong> running on
			top of <strong>CodeIgniter 4</strong>!
		</p>

		<div class="vue-demo">
			<h2>Vue 3 Reactivity Demo</h2>
			<p>
				Counter: <strong>{{ counter }}</strong>
			</p>
			<button @click="increment" class="btn">Incremen 3</button>
			<button @click="decrement" class="btn">Decrement</button>
			<button @click="reset" class="btn btn-secondary">Reset</button>
		</div>

		<div class="info-section">
			<p>
				If you would like to edit this Vue component, you will find it
				located at:
			</p>
			<pre><code>resources/js/components/Welcome.vue</code></pre>

			<p>The main Vue application file is located at:</p>
			<pre><code>resources/js/App.vue</code></pre>

			<p>
				The corresponding CodeIgniter controller for this page can be
				found at:
			</p>
			<pre><code>app/Controllers/Home.php</code></pre>
		</div>

		<div class="further">
			<h2>✨ Vue 3 Features</h2>
			<ul>
				<li>🚀 Composition API</li>
				<li>⚡ Vite for fast development</li>
				<li>📦 Hot Module Replacement (HMR)</li>
				<li>🎯 TypeScript support ready</li>
				<li>🔧 Modern build process</li>
			</ul>
		</div>
	</div>
</template>

<script>
import { ref } from 'vue';

export default {
	name: 'Welcome',
	setup() {
		const counter = ref(0);

		const increment = () => {
			counter.value++;
		};

		const decrement = () => {
			counter.value--;
		};

		const reset = () => {
			counter.value = 0;
		};

		return {
			counter,
			increment,
			decrement,
			reset,
		};
	},
};
</script>

<style scoped>
h1 {
	margin-bottom: 2.5rem;
}

h2 {
	font-size: 120%;
	line-height: 2.5rem;
	padding-top: 1.5rem;
}

.vue-demo {
	background-color: rgba(247, 248, 249, 1);
	border: 1px solid rgba(242, 242, 242, 1);
	border-radius: 8px;
	padding: 2rem;
	margin: 2rem 0;
	text-align: center;
}

.vue-demo h2 {
	color: #42b883;
	margin-bottom: 1rem;
	padding-top: 0;
}

.btn {
	background-color: #42b883;
	border: none;
	border-radius: 4px;
	color: white;
	cursor: pointer;
	font-size: 14px;
	margin: 0 0.5rem;
	padding: 10px 20px;
	transition: background-color 0.3s;
}

.btn:hover {
	background-color: #369870;
}

.btn-secondary {
	background-color: #6c757d;
}

.btn-secondary:hover {
	background-color: #5a6268;
}

.info-section pre {
	background-color: rgba(247, 248, 249, 1);
	border: 1px solid rgba(242, 242, 242, 1);
	display: block;
	font-size: 0.9rem;
	margin: 2rem 0;
	padding: 1rem 1.5rem;
	white-space: pre-wrap;
	word-break: break-all;
}

.info-section code {
	display: block;
}

.further {
	background-color: rgba(247, 248, 249, 1);
	border: 1px solid rgba(242, 242, 242, 1);
	border-radius: 8px;
	padding: 2rem;
	margin: 2rem 0;
}

.further h2 {
	padding-top: 0;
	margin-bottom: 1rem;
}

.further ul {
	list-style: none;
	padding-left: 0;
}

.further li {
	margin: 0.5rem 0;
	font-size: 1.1rem;
}
</style>
