"use client";

const ApiButton = () => {
  const handleClick = async () => {
    try {
      const response = await fetch("http://localhost:8000/api/hello");
      const data = await response.json();
      console.log("Data from API: ", data);
    } catch (error) {
      console.log("Error getting data from API: ", error);
    }
  };

  return (
    <button onClick={handleClick} type="button">
      Get Data!
    </button>
  );
};

export default ApiButton;
