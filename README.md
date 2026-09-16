#  Stationery Inventory Management System

A robust and secure web-based inventory management application built using **PHP CodeIgniter 4 (MVC Framework)** and **MySQL**. Designed to streamline the process of tracking, borrowing, and managing stationery items for students and administrators.

##  Key Features

###  Admin Module
*   **Secure Hidden Portal:** Admin login access is restricted via a dedicated secret route.
*   **Dashboard Analytics:** Real-time summary cards displaying Total Students, Total Stock Types, and Active Issues.
*   **Allocation History:** Comprehensive table view of all items issued, including student details, issue dates, and current return status.
*   **Full CRUD Inventory Control:** Admins can effortlessly Add, Edit, and Delete items, including uploading product images.

###  Student Module
*   **Secure Registration & Login:** Password hashing and duplicate email validation to prevent unauthorized or redundant accounts.
*   **Interactive Item Catalog:** View available stationery stock in a clean, image-supported grid layout.
*   **Smart Search:** Quickly find specific items using the integrated search and filter bar.
*   **Real-time Allocation:** Borrow items with a single click, instantly updating the available database stock.
*   **Return Management:** Easily return borrowed items, automatically restoring inventory counts.

##  Technologies Used
*   **Backend:** PHP, CodeIgniter 4 Framework
*   **Database:** MySQL
*   **Frontend:** HTML5, CSS3 (Custom Styling)
*   **Architecture:** MVC (Model-View-Controller)

##  How to Install & Run

1.  **Clone the Repository:**
    ```bash
    git clone [https://github.com/YOUR_GITHUB_USERNAME/inventory_system.git](https://github.com/mahendra07-U/inventory_system.git)
    ```
2.  **Environment Setup:** Move the project folder into your local server's web directory (e.g., `htdocs` for XAMPP).
3.  **Database Configuration:**
    *   Create a new MySQL database named `inventory_system`.
    *   Import the provided SQL backup file located in the `/database/` folder.
    *   Rename the `env` file to `.env` and configure your database connection settings (`database.default.hostname`, `database.default.database`, `database.default.username`, `database.default.password`).
4.  **Launch:** Open your browser and navigate to `http://localhost/inventory_system/public/` (or your configured virtual host).
