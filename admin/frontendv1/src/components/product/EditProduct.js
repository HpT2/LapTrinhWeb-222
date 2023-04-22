import React from 'react';
import { useState } from 'react';
import { Button, TextField,Box } from '@mui/material';
import {useLocation, useNavigate, useParams} from 'react-router-dom';
import axios from 'axios';
import { useEffect } from 'react';
import { getProductById, updateProduct } from 'services/productService';


function EditProduct() {
    const location = useLocation();
    const navigate = useNavigate();
    const [myFile, setMyfile] = useState(null);
    const [message, setMessage]= useState(null);
    const [product, setProduct] = useState({
        name: '',
        price: '',
        amount: '',
        description: '',
        image: '',
    });
    const [srcFile, setSrcFile] = useState('http://localhost:80/admin/img/'+ product.image);
    const {id} = useParams();
    React.useEffect(() => {
      async function fetchData() {
        try {
          const response = await getProductById(id);
          setProduct(response[0]);
          setSrcFile('http://localhost:80/admin/img/'+response[0].image);
        } catch (error) {
          console.error(error);
        }
      }
      fetchData();
    }, []);

    const handleChange = (e) => {
        e.preventDefault();
        const { name, value } = e.target;
        setProduct({ ...product, [name]: value });
    }
    const handleSubmit = async (e) => {
        // e.preventDefault();
        // updateProduct(id, product).then(function(response){
        //     navigate('/product');
        // }
        // );
        e.preventDefault();
        const data = new FormData();
        data.append('id', id);
        data.append('name', product.name);
        data.append('price', product.price);
        data.append('amount', product.amount);
        data.append('description', product.description);
        data.append('image', myFile);
        const response = await updateProduct(data);
        console.log(response);
        setTimeout(()=> {
          alert(response.message);
          navigate('/product');
        }, 2000);
     
    }
    const handleFile =  (e) => {
        e.preventDefault();
        const file =  e.target.files[0];
        setProduct({ ...product, image: file });
        setMyfile(file);
       // setSrcFile('http://localhost:80/admin/img/'+file.name);
    }

  return (
      <div>
      <h1 > EDIT PRODUCT</h1>
     <Box
      component="form"
      sx={{
        '& > :not(style)': { m: 1, width: "100%" },
      }}
      noValidate
      autoComplete="off"
    >

      <TextField value={product.name} id="outlined-basic" label="Name" variant="outlined" type="text" required name="name" onChange={handleChange}/>
      <TextField value={product.price} id="filled-basic" label="Price" variant="filled" type="number" required name="price" onChange={handleChange}/>
      <TextField value={product.amount} id="amo" label="Amount" variant="filled" type="number" required name="amount" onChange={handleChange}/>
      <TextField value={product.description} id="des" label="Description" variant="standard" type="text" required name="description" onChange={handleChange}/>
      <img src={srcFile} alt="image" width="100px" height="100%" ></img>
      <input  type='file' id="file" lable= "image" name="image" onChange={handleFile} ></input>
      <Button variant="contained" onClick={handleSubmit}>Submit</Button>
      <p>{message}</p>
    </Box>

    </div>
  )
}

export default EditProduct;
