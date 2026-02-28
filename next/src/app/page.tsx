import ApiButton from "@/components/ApiButton";

import styles from "./page.module.css";

const HomePage = () => {
  return (
    <div className={styles.homePageWrapper}>
      <h1>Next.js & Laravel Demo</h1>
      <p>A simple demo app with a Next.js frontend and a Laravel backend.</p>
      <ApiButton />
    </div>
  );
};

export default HomePage;
