async function fetchData(url) {
  try {
    const response = await axios.get(url);
    return response.data;
  } catch (error) {
    return error.response.data;
  }
}

async function postData(url, payload) {
  try {
    const response = await axios.post(url, payload, {
      headers: {
        "Content-Type": "application/json",
      },
    });
    return response.data;
  } catch (error) {
    return error.response.data;
  }
}

async function updateData(url, payload) {
  try {
    const response = await axios.patch(url, payload, {
      headers: {
        "Content-Type": "application/json",
      },
    });
    return response.data;
  } catch (error) {
    return error.response.data;
  }
}

async function deleteData(url) {
  try {
    const response = await axios.delete(url);
    return response.data;
  } catch (error) {
    console.log("DELETE Error:", error.response.data);
    return error.response.data;
  }
}
