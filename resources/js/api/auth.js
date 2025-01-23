import { BASE_URL } from "../constant";

export const authApi = {
    register: async (userData) => {
        const response = await fetch(`${BASE_URL}/auth/register`, {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                Accept: "application/json",
            },
            body: JSON.stringify(userData),
        });
        return response.json();
    },

    login: async (credentials) => {
        try {
            const response = await fetch(`${BASE_URL}/auth/login`, {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    Accept: "application/json",
                    "X-CSRF-TOKEN": document
                        .querySelector('meta[name="csrf-token"]')
                        .getAttribute("content"),
                },
                body: JSON.stringify(credentials),
            });
            const data = await response.json();
            if (!response.ok) {
                throw new Error(data.message || "Login failed");
            }

            return data;
        } catch (error) {
            console.error("Login error:", error);
            throw new Error(
                "An error occurred during login. Please try again."
            );
        }
    },

    logout: async () => {
        const response = await fetch(`${BASE_URL}/auth/logout`, {
            method: "POST",
            headers: {
                Authorization: `Bearer ${localStorage.getItem("token")}`,
                Accept: "application/json",
            },
        });
        localStorage.removeItem("token");
        return response.json();
    },
};
