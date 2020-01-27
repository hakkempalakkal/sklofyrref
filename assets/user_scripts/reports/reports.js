function createinvoice()
{
  var jobid= $("#jobid").val();   
  console.log(jobid);
  window.location = 'job-invoice/' + jobid;
}