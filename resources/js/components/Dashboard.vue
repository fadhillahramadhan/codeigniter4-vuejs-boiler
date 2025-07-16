<template>
	<div class="dashboard">
		<h1>Dashboard</h1>

		<!-- User Info -->
		<div class="user-welcome" v-if="userData">
			<h2>Welcome back, {{ userData.name }}!</h2>
			<p>{{ userData.email }}</p>
		</div>

		<!-- Statistics Cards -->
		<div class="stats-grid" v-if="stats">
			<div class="stat-card">
				<h3>Total Users</h3>
				<div class="stat-number">{{ stats.totalUsers }}</div>
			</div>
			<div class="stat-card">
				<h3>Total Posts</h3>
				<div class="stat-number">{{ stats.totalPosts }}</div>
			</div>
			<div class="stat-card">
				<h3>Active Users</h3>
				<div class="stat-number">{{ stats.activeUsers }}</div>
			</div>
		</div>

		<!-- API Data Example -->
		<div class="api-section">
			<h3>Load Additional Data (Auto Routing APIs)</h3>
			<div class="api-buttons">
				<button @click="loadPosts" :disabled="loading">
					{{ loading ? 'Loading...' : 'Load Posts from API' }}
				</button>
			</div>

			<div v-if="users.length > 0" class="data-section">
				<h4>Users (from /api/users):</h4>
				<ul>
					<li v-for="user in users" :key="user.id">
						{{ user.name }} - {{ user.email }}
					</li>
				</ul>
			</div>

			<div v-if="posts.length > 0" class="data-section">
				<h4>Posts (from /api/posts):</h4>
				<div class="posts-grid">
					<div v-for="post in posts" :key="post.id" class="post-card">
						<h5>{{ post.title }}</h5>
						<p>{{ post.content }}</p>
						<small>Author ID: {{ post.author_id }}</small>
					</div>
				</div>
			</div>
		</div>
	</div>
</template>

<script>
export default {
	name: 'Dashboard',
	props: {
		serverData: {
			type: Object,
			default: () => ({}),
		},
	},
	data() {
		return {
			users: [],
			posts: [],
			loading: false,
		};
	},
	computed: {
		userData() {
			return this.serverData.userData;
		},
		stats() {
			return this.serverData.stats;
		},
	},
	methods: {
		async loadUsers() {
			this.loading = true;
			try {
				// Example API call to CodeIgniter endpoint
				const response = await fetch(
					`${this.serverData.baseUrl}/api/users`
				);
				if (response.ok) {
					this.users = await response.json();
				}
			} catch (error) {
				console.error('Error loading users:', error);
			} finally {
				this.loading = false;
			}
		},

		async loadPosts() {
			this.loading = true;
			try {
				// API call to the new Posts controller
				const response = await fetch(
					`${this.serverData.baseUrl}/api/posts`
				);
				if (response.ok) {
					const result = await response.json();
					this.posts = result.data || result; // Handle both formats
				}
			} catch (error) {
				console.error('Error loading posts:', error);
			} finally {
				this.loading = false;
			}
		},
	},
};
</script>

<style scoped>
.dashboard {
	padding: 20px;
}

.user-welcome {
	background: #f8f9fa;
	padding: 20px;
	border-radius: 8px;
	margin-bottom: 30px;
}

.user-welcome h2 {
	margin: 0 0 10px 0;
	color: #dd4814;
}

.stats-grid {
	display: grid;
	grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
	gap: 20px;
	margin-bottom: 30px;
}

.stat-card {
	background: white;
	padding: 20px;
	border-radius: 8px;
	box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
	text-align: center;
}

.stat-card h3 {
	margin: 0 0 10px 0;
	font-size: 14px;
	color: #666;
	text-transform: uppercase;
}

.stat-number {
	font-size: 32px;
	font-weight: bold;
	color: #dd4814;
}

.api-section {
	background: white;
	padding: 20px;
	border-radius: 8px;
	box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

.api-section button {
	background: #dd4814;
	color: white;
	border: none;
	padding: 10px 20px;
	border-radius: 4px;
	cursor: pointer;
	margin-bottom: 20px;
}

.api-section button:hover:not(:disabled) {
	background: #c13f0f;
}

.api-section button:disabled {
	background: #ccc;
	cursor: not-allowed;
}

.users-list ul {
	list-style: none;
	padding: 0;
}

.users-list li {
	padding: 10px;
	border-bottom: 1px solid #eee;
}
</style>
