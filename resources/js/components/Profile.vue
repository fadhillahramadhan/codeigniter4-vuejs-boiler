<template>
	<div class="profile">
		<h1>User Profile</h1>

		<div class="profile-content" v-if="user">
			<div class="profile-header">
				<div class="avatar">
					<img
						:src="user.avatar || '/default-avatar.png'"
						:alt="user.name"
					/>
				</div>
				<div class="user-info">
					<h2>{{ user.name }}</h2>
					<p class="email">{{ user.email }}</p>
					<p class="bio" v-if="user.bio">{{ user.bio }}</p>
				</div>
			</div>

			<div class="profile-actions">
				<button @click="editProfile" class="btn-primary">
					Edit Profile
				</button>
				<button @click="changePassword" class="btn-secondary">
					Change Password
				</button>
			</div>

			<!-- Profile Form (shows when editing) -->
			<div class="profile-form" v-if="editing">
				<h3>Edit Profile</h3>
				<form @submit.prevent="saveProfile">
					<div class="form-group">
						<label for="name">Name:</label>
						<input
							type="text"
							id="name"
							v-model="editForm.name"
							required
						/>
					</div>

					<div class="form-group">
						<label for="email">Email:</label>
						<input
							type="email"
							id="email"
							v-model="editForm.email"
							required
						/>
					</div>

					<div class="form-group">
						<label for="bio">Bio:</label>
						<textarea
							id="bio"
							v-model="editForm.bio"
							rows="4"
						></textarea>
					</div>

					<div class="form-actions">
						<button type="submit" :disabled="saving">
							{{ saving ? 'Saving...' : 'Save Changes' }}
						</button>
						<button type="button" @click="cancelEdit">
							Cancel
						</button>
					</div>
				</form>
			</div>
		</div>

		<div v-else class="no-user">
			<p>No user data available.</p>
		</div>
	</div>
</template>

<script>
export default {
	name: 'Profile',
	props: {
		serverData: {
			type: Object,
			default: () => ({}),
		},
	},
	data() {
		return {
			editing: false,
			saving: false,
			editForm: {
				name: '',
				email: '',
				bio: '',
			},
		};
	},
	computed: {
		user() {
			return this.serverData.user;
		},
	},
	methods: {
		editProfile() {
			if (this.user) {
				this.editForm = { ...this.user };
				this.editing = true;
			}
		},

		cancelEdit() {
			this.editing = false;
			this.editForm = {
				name: '',
				email: '',
				bio: '',
			};
		},

		async saveProfile() {
			this.saving = true;
			try {
				// Example API call to update profile
				const response = await fetch(
					`${this.serverData.baseUrl}/api/users/${this.user.id}`,
					{
						method: 'PUT',
						headers: {
							'Content-Type': 'application/json',
							'X-Requested-With': 'XMLHttpRequest',
							'X-CSRF-TOKEN': this.serverData.csrfToken,
						},
						body: JSON.stringify(this.editForm),
					}
				);

				if (response.ok) {
					// Update local user data
					Object.assign(this.user, this.editForm);
					this.editing = false;
					alert('Profile updated successfully!');
				} else {
					alert('Error updating profile');
				}
			} catch (error) {
				console.error('Error saving profile:', error);
				alert('Error updating profile');
			} finally {
				this.saving = false;
			}
		},

		changePassword() {
			// Redirect to change password page or show modal
			window.location.href = `${this.serverData.baseUrl}/change-password`;
		},
	},
};
</script>

<style scoped>
.profile {
	padding: 20px;
	max-width: 800px;
}

.profile-header {
	display: flex;
	align-items: flex-start;
	gap: 20px;
	margin-bottom: 30px;
	padding: 20px;
	background: white;
	border-radius: 8px;
	box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

.avatar img {
	width: 100px;
	height: 100px;
	border-radius: 50%;
	object-fit: cover;
	border: 3px solid #dd4814;
}

.user-info h2 {
	margin: 0 0 5px 0;
	color: #333;
}

.email {
	color: #666;
	margin: 0 0 10px 0;
}

.bio {
	color: #555;
	line-height: 1.5;
	margin: 0;
}

.profile-actions {
	margin-bottom: 20px;
}

.btn-primary,
.btn-secondary {
	padding: 10px 20px;
	border: none;
	border-radius: 4px;
	cursor: pointer;
	margin-right: 10px;
	font-size: 14px;
}

.btn-primary {
	background: #dd4814;
	color: white;
}

.btn-primary:hover {
	background: #c13f0f;
}

.btn-secondary {
	background: #6c757d;
	color: white;
}

.btn-secondary:hover {
	background: #545b62;
}

.profile-form {
	background: white;
	padding: 20px;
	border-radius: 8px;
	box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

.form-group {
	margin-bottom: 20px;
}

.form-group label {
	display: block;
	margin-bottom: 5px;
	font-weight: bold;
	color: #333;
}

.form-group input,
.form-group textarea {
	width: 100%;
	padding: 10px;
	border: 1px solid #ddd;
	border-radius: 4px;
	font-size: 14px;
}

.form-group input:focus,
.form-group textarea:focus {
	outline: none;
	border-color: #dd4814;
}

.form-actions {
	display: flex;
	gap: 10px;
}

.form-actions button {
	padding: 10px 20px;
	border: none;
	border-radius: 4px;
	cursor: pointer;
}

.form-actions button[type='submit'] {
	background: #dd4814;
	color: white;
}

.form-actions button[type='submit']:hover:not(:disabled) {
	background: #c13f0f;
}

.form-actions button[type='submit']:disabled {
	background: #ccc;
	cursor: not-allowed;
}

.form-actions button[type='button'] {
	background: #6c757d;
	color: white;
}

.form-actions button[type='button']:hover {
	background: #545b62;
}

.no-user {
	text-align: center;
	padding: 40px;
	color: #666;
}
</style>
