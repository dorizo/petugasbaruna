function rupiah(x)
{
  console.log(x);
    
  retVal = x ? parseFloat(x.replace(/,/g, '')) : 0;

  //apply formatting
  return retVal.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
}