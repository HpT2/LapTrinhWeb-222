import axios from 'axios';

const PRO_API_URL = process.env.REACT_APP_URL + '/order/index.php'; //index.php


export const getOrders = async() =>{
    try{
        const response = await axios.get(PRO_API_URL);      
        return response.data;
    } catch(error){
        console.log(error);
        return null;
    }
}
export const createOrder = async (Order)=>{
    try{
        const response= await axios.post(PRO_API_URL, Order, {
            headers: {
                'Content-Type': 'multipart/form-data'
            }
        });
        console.log(response);
        if(response.status == 200){
            return response.data; 
        }
        else {
            return response.statusText;
        }
    } catch(error){
        console.log(error);
        return null;
    }
}
export const getOrderById = async (OrderId) =>{
    try{
        const response = await axios.get(PRO_API_URL + '/' + OrderId);
        return response.data;
    } catch(error){
        console.log(error);
        return null;
    }
}

export const updateOrder= async (order) =>{
    try{
        //const response = await axios.put(PRO_API_URL + '/' + orderId+'/edit', order);
        
        const response = await axios.post(PRO_API_URL, order, {
            headers: {
                'Content-Type': 'multipart/form-data'
            }
        });
        if(response.status == 200){
            return response.data;
        }
        else {
            return response.statusText;
        }
    } catch(error){
        console.log(error);
        return null;
    }
}

export const deleteOrder = async (OrderIds)=>{
    try{
        const response = await axios.delete(PRO_API_URL + '/' + OrderIds+'/delete');
        //console.log(response);
       
        return response;
    } catch(error){
        console.log(error);
        return null;
    }
}